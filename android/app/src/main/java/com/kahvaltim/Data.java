package com.kahvaltim;

import android.annotation.TargetApi;
import android.os.Build;
import android.preference.PreferenceActivity;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.Spinner;
import android.widget.TextView;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;

import java.lang.reflect.Field;
import java.nio.charset.StandardCharsets;

/**
 * Created by mustafa on 31.10.2016.
 */

public class Data {
    public static Siparis siparis= new Siparis();
    public String Result;
    AppCompatActivity activity;

    public Data(AppCompatActivity activity) {
        this.activity = activity;
    }

    public String getserverurl(String url)  {
        String ip = "10.0.2.1";
        String u = "http://" + ip + "/kahvaltim/" + url;
        return u;
    }

    public void geturl(String url){
        AsyncHttpClient client = new AsyncHttpClient();
        client.get(getserverurl(url), new AsyncHttpResponseHandler() {

            @TargetApi(Build.VERSION_CODES.KITKAT)
            @Override
            public void onSuccess(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes) {
                Result = new String(bytes, StandardCharsets.UTF_8);
            }

            @Override
            public void onFailure(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes, Throwable throwable) {

            }
        });
    }

    public String getTextViewText(int id){
        return ((TextView) activity.findViewById(id)).getText().toString();
    }

    public void setTextViewText(int id, String text){
        ((TextView) activity.findViewById(id)).setText(text);
    }

    public String getSpinnerText(int id){
        return ((Spinner) activity.findViewById(id)).getSelectedItem().toString();
    }

    public String sutungetir(String metin, int index){
        String[] ary = metin.split(";");
        return ary[index];
    }



}
