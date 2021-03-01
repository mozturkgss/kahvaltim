package com.kahvaltim;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by mustafa.ozturk3 on 18.10.2017.
 */

public class Siparis {
    public int kullaniciid = 0;
    public String adresadi = "";
    public float tutar = 0f;
    public List<SiparisDetay> siparisdetay = new ArrayList<SiparisDetay>();

    public Siparis() {
    }

    public void siparisdetayekle(int stokid, int miktar, float birimfiyat){
        SiparisDetay detay = new SiparisDetay();
        detay.stokid = stokid;
        detay.miktar = miktar;
        detay.birimfiyat = birimfiyat;
        siparisdetay.add(detay);
    }

    public void siparisdetaytemizle(){
        siparisdetay.clear();
    }

    public class SiparisDetay {
        public int stokid = 0;
        public int miktar = 0;
        public float birimfiyat = 0;
    }
}
