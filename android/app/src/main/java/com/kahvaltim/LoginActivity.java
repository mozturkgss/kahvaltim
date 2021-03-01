package com.kahvaltim;

import android.animation.Animator;
import android.animation.AnimatorListenerAdapter;
import android.annotation.TargetApi;
import android.content.pm.PackageManager;
import android.support.annotation.NonNull;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.app.LoaderManager.LoaderCallbacks;

import android.content.CursorLoader;
import android.content.Loader;
import android.database.Cursor;
import android.net.Uri;
import android.os.AsyncTask;

import android.os.Build;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.support.v7.view.ActionMode;
import android.text.TextUtils;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.inputmethod.EditorInfo;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;

import java.nio.charset.StandardCharsets;
import java.util.ArrayList;
import java.util.List;

import static android.Manifest.permission.READ_CONTACTS;

/**
 * A login screen that offers login via email/password.
 */
public class LoginActivity extends AppCompatActivity{
    Data data = new Data(this);
    int kullaniciid=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

    }

    public void kayitclick(View view){
        data.setTextViewText(R.id.textViewLoginUyari, "");

        String url = "kullanicikayit.php?kullaniciadi="+ data.getTextViewText(R.id.kullaniciadi) + "&sifre=" + data.getTextViewText(R.id.sifre);

        AsyncHttpClient client = new AsyncHttpClient();
        client.get(data.getserverurl(url), new AsyncHttpResponseHandler() {

            @TargetApi(Build.VERSION_CODES.KITKAT)
            @Override
            public void onSuccess(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes) {
                String Result = new String(bytes, StandardCharsets.UTF_8);


                if (Result.equals("-1"))
                    data.setTextViewText(R.id.textViewLoginUyari, "Şifre yanlış.");
                else {
                    kullaniciid = Integer.valueOf(Result);
                    finish();
                }
            }

            @Override
            public void onFailure(int i, cz.msebera.android.httpclient.Header[] headers, byte[] bytes, Throwable throwable) {

            }
        });
    }

    @Override
    public void finish() {
        getIntent().putExtra("kullaniciid", kullaniciid);
        setResult(RESULT_OK, getIntent());
        super.finish();
    }
}

