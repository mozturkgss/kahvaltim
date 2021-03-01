package com.kahvaltim;

import android.annotation.TargetApi;
import android.content.Intent;
import android.content.res.TypedArray;
import android.os.Build;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;

import java.nio.charset.StandardCharsets;

import cz.msebera.android.httpclient.util.EntityUtils;

public class MainActivity extends AppCompatActivity {
    private static final int REQUEST_CODE = 0 ;
    ListView listview;
    ListViewAdapter adapter;
    private int[] urunid;
    private String[] urunadi;
    private String[] urunaciklamasi;
    private String[] urunfiyati;
    private int[] urunresmi_int;
    private int kullaniciid = 0;
    private int[] urunadeti;
    private boolean login;
    Data data = new Data(this);
    String liste;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        stokgetir();
    }

    @Override
    protected void onResume() {
        super.onResume();
        if (kullaniciid == 0){
            Intent intent = new Intent(MainActivity.this, LoginActivity.class);
            startActivityForResult(intent, REQUEST_CODE);
        }

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (resultCode == RESULT_OK && requestCode == REQUEST_CODE) {
            if (data.hasExtra("kullaniciid")) {
                kullaniciid= data.getExtras().getInt("kullaniciid");
            }
        }
    }

    private void stokgetir(){
        sepetguncelle();
        String url = "stokgetir.php";

        AsyncHttpClient client = new AsyncHttpClient();
        client.get(data.getserverurl(url), new AsyncHttpResponseHandler() {

            @TargetApi(Build.VERSION_CODES.KITKAT)
            @Override
            public void onSuccess(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes) {
                liste = new String(bytes);
                decodestok();
            }

            @Override
            public void onFailure(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes, Throwable throwable) {

            }
        });
    }

    private void decodestok(){
        //gelen text veri değişkenlere atanıyor
        int id;
        String stokadi;
        String aciklama;
        int resimid;
        String birim;
        String birimfiyat;

        if (liste.indexOf("<br>")>0) {
            String[] list = liste.split("<br>");

            urunid = new int[list.length] ;
            urunadi = new String[list.length];
            urunaciklamasi = new String[list.length];
            urunfiyati = new String[list.length];
            urunresmi_int = new int[list.length] ;
            urunadeti = new int[list.length];

            for (int i = 0; i < list.length; i++) {
                String metin = list[i];
                id = Integer.valueOf(data.sutungetir(metin, 0));
                stokadi = data.sutungetir(metin, 1);
                aciklama = data.sutungetir(metin, 2);
                resimid = Integer.valueOf(data.sutungetir(metin, 3));
                birim = data.sutungetir(metin, 4);
                birimfiyat = data.sutungetir(metin, 5);

                urunid[i] = id ;
                urunadi[i] = stokadi;
                urunaciklamasi[i] = aciklama;
                urunfiyati[i] = birimfiyat;
                urunresmi_int[i] = getResources().getIdentifier("kahvalti"+resimid, "drawable", this.getPackageName());
                urunadeti[i] = 0 ;
            }

            listview = (ListView) findViewById(R.id.kahvaltiliste);//list objesini oluşturuyorz
            adapter = new ListViewAdapter(this, urunid, urunadi, urunaciklamasi, urunfiyati, urunresmi_int, urunadeti);
            listview.setAdapter(adapter);//adı üstünde set ediyoruz
        }

    }

    public void artirclick(View view){
        int position=(Integer)view.getTag();

        RelativeLayout vwParentRow = (RelativeLayout)view.getParent();
        TextView child = (TextView)vwParentRow.getChildAt(6);

        TextView textViewbirimfiyat = (TextView)vwParentRow.getChildAt(4);
        float birimfiyat = Float.valueOf(textViewbirimfiyat.getText().toString().replaceAll(" TL", ""));

        Data.siparis.tutar += birimfiyat;
        urunadeti[position]++;
        child.setText(String.valueOf(urunadeti[position]));
        vwParentRow.refreshDrawableState();

        sepetguncelle();
    }

    public void azaltclick(View view){
        int position=(Integer)view.getTag();

        RelativeLayout vwParentRow = (RelativeLayout)view.getParent();
        TextView child = (TextView)vwParentRow.getChildAt(6);

        TextView textViewbirimfiyat = (TextView)vwParentRow.getChildAt(4);
        float birimfiyat = Float.valueOf(textViewbirimfiyat.getText().toString().replaceAll(" TL", ""));

        if (urunadeti[position] > 0){
            Data.siparis.tutar -= birimfiyat;
            urunadeti[position]--;
        }

        child.setText(String.valueOf(urunadeti[position]));
        vwParentRow.refreshDrawableState();

        sepetguncelle();
    }

    private void sepetguncelle(){
        data.setTextViewText(R.id.textViewtoplamtutar, String.format("%.2f", Data.siparis.tutar) +  " TL");
    }

    public void siparisclick(View view){
        if (urunid.length>0) {
            Data.siparis.kullaniciid = kullaniciid;
            Data.siparis.siparisdetaytemizle();
            for (int i = 0; i < urunid.length; i++) {
                if (urunadeti[i] > 0) {
                    float birimfiyat = Float.valueOf(urunfiyati[i].replaceAll(" TL", ""));
                    Data.siparis.siparisdetayekle(urunid[i], urunadeti[i], birimfiyat);
                }
            }

            Intent intent = new Intent(MainActivity.this, SiparisActivity.class);
            startActivity(intent);
        }
    }


}
