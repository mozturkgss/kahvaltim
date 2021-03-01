package com.kahvaltim;

import android.annotation.TargetApi;
import android.content.Intent;
import android.os.Build;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Spinner;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;

import java.util.ArrayList;
import java.util.List;

public class SiparisActivity extends AppCompatActivity {
    Data data = new Data(this);
    String liste;
    List<String> categories = new ArrayList<String>();
    private static final int ACTIVITY_RESULT_CODE_ADRES = 0;
    private static final int ACTIVITY_RESULT_CODE_ILERI = 1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_siparis);

        Intent myIntent = getIntent();

        adresgetir();
        data.setTextViewText(R.id.textViewTutar, String.format("%.2f", Data.siparis.tutar) +  " TL");
    }

    public void adresclick(View view){
        Intent intent = new Intent(this, AdresActivity.class);
        startActivityForResult(intent, ACTIVITY_RESULT_CODE_ADRES);
    }

    public void ilericlick(View view){
        Spinner spinner = (Spinner) findViewById(R.id.spinneradres);
        Data.siparis.adresadi = spinner.getSelectedItem().toString();
        Intent intent = new Intent(this, SiparisSonucActivity.class);
        startActivityForResult(intent, ACTIVITY_RESULT_CODE_ILERI);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        // check that it is the SecondActivity with an OK result
        if (requestCode == ACTIVITY_RESULT_CODE_ADRES) {
            if (resultCode == RESULT_OK) {
                adresgetir();
            }
        }

        if (requestCode == ACTIVITY_RESULT_CODE_ILERI) {
            if (resultCode == RESULT_OK) {
                this.finish();
            }
        }
    }

    public void gerisiparisclick(View view){
        finish();
    }

    private void adresgetir(){
        String url = "adresgetir.php?kullaniciid=" + Data.siparis.kullaniciid;

        AsyncHttpClient client = new AsyncHttpClient();
        client.get(data.getserverurl(url), new AsyncHttpResponseHandler() {

            @TargetApi(Build.VERSION_CODES.KITKAT)
            @Override
            public void onSuccess(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes) {
                liste = new String(bytes);
                decodeadres();
            }

            @Override
            public void onFailure(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes, Throwable throwable) {

            }
        });
    }

    private void decodeadres(){
        int id;
        String adres;
        categories.clear();

        if (liste.indexOf("<br>")>0) {
            String[] list = liste.split("<br>");

            for (int i = 0; i < list.length; i++) {
                String adress = list[i];
                categories.add(adress);
            }
        }
        Spinner spinner = (Spinner) findViewById(R.id.spinneradres);
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, categories);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(dataAdapter);
        spinner.setSelection(categories.size()-1);
    }
}

