package com.kahvaltim;

import android.annotation.TargetApi;
import android.app.Activity;
import android.content.Intent;
import android.media.Image;
import android.opengl.Visibility;
import android.os.Build;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.ImageView;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;

import java.nio.charset.StandardCharsets;

import static android.view.View.VISIBLE;

public class SiparisSonucActivity extends AppCompatActivity {
    Data data = new Data(this);
    private static int detaysayisi = 0;
    Activity ac = this;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_siparis_sonuc);
        data.setTextViewText(R.id.textViewSonuc, "İşlem Devam Ediyor.");
        ImageButton imageButon = (ImageButton) this.findViewById(R.id.imageButtonSonucBasarili);
        imageButon.setVisibility(View.INVISIBLE);
        siparisekle();
    }

    private void siparisekle(){
        String url = "siparisekle.php?kullaniciid=" + Data.siparis.kullaniciid + "&adresadi=" + Data.siparis.adresadi + "&tutar=" + Data.siparis.tutar;

        AsyncHttpClient client = new AsyncHttpClient();
        client.get(data.getserverurl(url), new AsyncHttpResponseHandler() {

            @TargetApi(Build.VERSION_CODES.KITKAT)
            @Override
            public void onSuccess(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes) {
                String Result = new String(bytes, StandardCharsets.UTF_8);
                siparisdetaysekle(Integer.valueOf(Result));
            }

            @Override
            public void onFailure(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes, Throwable throwable) {

            }
        });
    }

    public void siparisbasariliclick(View view){
        Intent intent = new Intent();
        setResult(RESULT_OK, intent);
        this.finish();
    }
    private void siparisdetaysekle(int siparisid){
        detaysayisi = 0;
        for(int i=0; i<Data.siparis.siparisdetay.size(); i++){
            String url = "siparisdetayekle.php?siparisid=" + siparisid + "&stokid=" + Data.siparis.siparisdetay.get(i).stokid +
                    "&miktar=" + Data.siparis.siparisdetay.get(i).miktar  + "&birimfiyat=" + Data.siparis.siparisdetay.get(i).birimfiyat  +
                    "&tutar=" + Data.siparis.siparisdetay.get(i).birimfiyat*Data.siparis.siparisdetay.get(i).miktar;

            AsyncHttpClient client = new AsyncHttpClient();
            client.get(data.getserverurl(url), new AsyncHttpResponseHandler() {

                @TargetApi(Build.VERSION_CODES.KITKAT)
                @Override
                public void onSuccess(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes) {
                    detaysayisi++;

                    if (detaysayisi>=Data.siparis.siparisdetay.size()){
                        data.setTextViewText(R.id.textViewSonuc, "Siparişiniz Tamamlandı.");
                        ImageButton imageButon = (ImageButton) ac.findViewById(R.id.imageButtonSonucBasarili);
                        imageButon.setVisibility(View.VISIBLE);
                    }
                }

                @Override
                public void onFailure(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes, Throwable throwable) {

                }
            });
        }
    }


}
