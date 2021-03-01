package com.kahvaltim;

import android.annotation.TargetApi;
import android.content.Intent;
import android.os.Build;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Spinner;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;

import java.nio.charset.StandardCharsets;
import java.util.ArrayList;
import java.util.List;

public class AdresActivity extends AppCompatActivity {
    Data data = new Data(this);

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        Intent myIntent = getIntent();

        setContentView(R.layout.activity_adres);

        Spinner spinner = (Spinner) findViewById(R.id.spinnerill);

        // Spinner click listener
        //spinner.setOnItemSelectedListener(this);

        // Spinner Drop down elements
        List<String> categories = new ArrayList<String>();
        categories.add("Adana");
        categories.add("Adıyaman");
        categories.add("Afyon");
        categories.add("Ağrı");
        categories.add("Aksaray");
        categories.add("Amasya");
        categories.add("Ankara");
        categories.add("Antalya");
        categories.add("Ardahan");
        categories.add("Artvin");
        categories.add("Aydın");
        categories.add("Balıkesir");
        categories.add("Bartın");
        categories.add("Batman");
        categories.add("Bayburt");
        categories.add("Bilecik");
        categories.add("Bingöl");
        categories.add("Bitlis");
        categories.add("Bolu");
        categories.add("Burdur");
        categories.add("Bursa");
        categories.add("Çanakkale");
        categories.add("Çankırı");
        categories.add("Çorum");
        categories.add("Denizli");
        categories.add("Diyarbakır");
        categories.add("Düzce");
        categories.add("Edirne");
        categories.add("Elazığ");
        categories.add("Erzincan");
        categories.add("Erzurum");
        categories.add("Eskişehir");
        categories.add("Gaziantep");
        categories.add("Giresun");
        categories.add("Gümüşhane");
        categories.add("Hakkari");
        categories.add("Hatay");
        categories.add("Iğdır");
        categories.add("Isparta");
        categories.add("İçel (Mersin)");
        categories.add("İstanbul");
        categories.add("İzmir");
        categories.add("K.maraş");
        categories.add("Karabük");
        categories.add("Karaman");
        categories.add("Kars");
        categories.add("Kastamonu");
        categories.add("Kayseri");
        categories.add("Kırıkkale");
        categories.add("Kırklareli");
        categories.add("Kırşehir");
        categories.add("Kilis");
        categories.add("Kocaeli");
        categories.add("Konya");
        categories.add("Kütahya");
        categories.add("Malatya");
        categories.add("Manisa");
        categories.add("Mardin");
        categories.add("Muğla");
        categories.add("Muş");
        categories.add("Nevşehir");
        categories.add("Niğde");
        categories.add("Ordu");
        categories.add("Osmaniye");
        categories.add("Rize");
        categories.add("Sakarya");
        categories.add("Samsun");
        categories.add("Siirt");
        categories.add("Sinop");
        categories.add("Sivas");
        categories.add("Şanlıurfa");
        categories.add("Şırnak");
        categories.add("Tekirdağ");
        categories.add("Tokat");
        categories.add("Trabzon");
        categories.add("Tunceli");
        categories.add("Uşak");
        categories.add("Van");
        categories.add("Yalova");
        categories.add("Yozgat");
        categories.add("Zonguldak");

        // Creating adapter for spinner
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, categories);

        // Drop down layout style - list view with radio button
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        // attaching data adapter to spinner
        spinner.setAdapter(dataAdapter);
    }

    public void gericlick(View view){
        this.finish();
    }

    public void adresekleclick(View view){
        String url = "adreskayit.php?il="+ data.getSpinnerText(R.id.spinnerill) + "&ilce=" + data.getTextViewText(R.id.textViewilce) + "&adresadi="
                + data.getTextViewText(R.id.textViewadresadi)+ "&adres=" + data.getTextViewText(R.id.textViewadres)+ "&kullaniciid=" + Data.siparis.kullaniciid+ "&adisoyadi=" + data.getTextViewText(R.id.textViewadisoyadi);

        AsyncHttpClient client = new AsyncHttpClient();
        client.get(data.getserverurl(url), new AsyncHttpResponseHandler() {

            @TargetApi(Build.VERSION_CODES.KITKAT)
            @Override
            public void onSuccess(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes) {
                String Result = new String(bytes, StandardCharsets.UTF_8);


                if (Result.equals("-1")) {

                }
                else {
                    Intent intent = new Intent();
                    setResult(RESULT_OK, intent);
                    finish();
                }
            }

            @Override
            public void onFailure(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes, Throwable throwable) {

            }
        });
    }
}
