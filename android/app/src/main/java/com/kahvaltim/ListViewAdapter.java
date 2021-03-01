package com.kahvaltim;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

public class ListViewAdapter extends BaseAdapter {

	Context context;
	int[] urunid;
	String[] urunadi;
	String[] urunaciklamasi;
	String[] urunfiyati;
	int[] urunadeti;
	int[] urunresmi;
	LayoutInflater inflater;

	public ListViewAdapter(Context context, int[] urunid, String[] urunadi, String[] urunaciklamasi, String[] urunfiyati, int[] urunresmi, int[] urunadeti) {
		this.context = context;
		this.urunid = urunid;
		this.urunadi = urunadi;
		this.urunaciklamasi = urunaciklamasi;
		this.urunfiyati = urunfiyati;
		this.urunresmi = urunresmi;
        this.urunadeti = urunadeti;
	}

	@Override
	public int getCount() {
		return urunid.length;
	}

	@Override
	public Object getItem(int position) {
		return null;
	}

	@Override
	public long getItemId(int position) {
		return 0;
	}

	public View getView(int position, View convertView, ViewGroup parent) {
		TextView urunadi_textview;
		TextView urunaciklamasi_textview;
		TextView urunfiyati_textview;
		ImageView urunresmi_imageView;
		TextView urunadedi_textview;

		inflater = (LayoutInflater) context
				.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
			
		View itemView = inflater.inflate(R.layout.list_item_row, parent, false);

		urunadi_textview = (TextView) itemView.findViewById(R.id.urunadi);
		urunaciklamasi_textview = (TextView) itemView.findViewById(R.id.urunaciklama);
		urunfiyati_textview = (TextView) itemView.findViewById(R.id.urunfiyati);
		urunresmi_imageView = (ImageView) itemView.findViewById(R.id.urunresmi);
		urunadedi_textview = (TextView) itemView.findViewById(R.id.urunadeti);

		urunadi_textview.setText(urunadi[position]);
		urunaciklamasi_textview.setText(urunaciklamasi[position]);
		urunfiyati_textview.setText(urunfiyati[position] + " TL");
		urunresmi_imageView.setImageResource(urunresmi[position]);
        int adet = urunadeti[position];
		urunadedi_textview.setText(adet + "");


        Button artir = (Button) itemView.findViewById(R.id.buttonartir);
        Button azalt = (Button) itemView.findViewById(R.id.buttonazalt);

        artir.setTag(position);
        azalt.setTag(position);

		return itemView;
	}
}
