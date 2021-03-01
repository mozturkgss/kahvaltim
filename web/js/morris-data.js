$(function() {
var months = ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'];

Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: (new Date()).getFullYear() + '-01',
            tutar: tutar[1],
            sayi: sayi[1]
        }, {
            period: (new Date()).getFullYear() + '-02',
            tutar: tutar[2],
            sayi: sayi[2]
        }, {
            period: (new Date()).getFullYear() + '-03',
            tutar: tutar[3],
            sayi: sayi[3]
        }, {
            period: (new Date()).getFullYear() + '-04',
            tutar: tutar[4],
            sayi: sayi[4]
        }, {
            period: (new Date()).getFullYear() + '-05',
            tutar: tutar[5],
            sayi: sayi[5]
        }, {
            period: (new Date()).getFullYear() + '-06',
            tutar: tutar[6],
            sayi: sayi[6]
        }, {
            period: (new Date()).getFullYear() + '-07',
            tutar: tutar[7],
            sayi: sayi[7]
        }, {
            period: (new Date()).getFullYear() + '-08',
            tutar: tutar[8],
            sayi: sayi[8]
        }, {
            period: (new Date()).getFullYear() + '-09',
            tutar: tutar[9],
            sayi: sayi[9]
        }, {
            period: (new Date()).getFullYear() + '-10',
            tutar: tutar[10],
            sayi: sayi[10]
		}, {
            period: (new Date()).getFullYear() + '-11',
            tutar: tutar[11],
            sayi: sayi[11]
		}, {
            period: (new Date()).getFullYear() + '-12',
            tutar: tutar[12],
            sayi: sayi[12]
        }],
        xkey: 'period',
        ykeys: ['tutar', 'sayi'],
        labels: ['Satış Tutarı (TL)', 'Sipariş Sayısı (Adet)'],
        pointSize: 2,
        hideHover: 'auto',
		xLabelFormat: function (x) { return months[x.getMonth()]},
        resize: true
    });


    Morris.Bar({
        element: 'morris-bar-chartsip',
        data: [{
            y: 'Ocak',
            a: sipyil1[1],
            b: sipyil2[1]
        }, {
            y: 'Şubat',
            a: sipyil1[2],
            b: sipyil2[2]
        }, {
            y: 'Mart',
            a: sipyil1[3],
            b: sipyil2[3]
        }, {
            y: 'Nisan',
            a: sipyil1[4],
            b: sipyil2[4]
        }, {
            y: 'Mayıs',
            a: sipyil1[5],
            b: sipyil2[5]
        }, {
            y: 'Haziran',
            a: sipyil1[6],
            b: sipyil2[6]
        }, {
            y: 'Temmuz',
            a: sipyil1[7],
            b: sipyil2[7]
		}, {
            y: 'Ağustos',
            a: sipyil1[8],
            b: sipyil2[8]
		}, {
            y: 'Eylül',
            a: sipyil1[9],
            b: sipyil2[9]
		}, {
            y: 'Ekim',
            a: sipyil1[10],
            b: sipyil2[10]
		}, {
            y: 'Kasım',
            a: sipyil1[11],
            b: sipyil2[11]		
		}, {
            y: 'Aralık',
            a: sipyil1[12],
            b: sipyil2[12]
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: [(new Date()).getFullYear()-1, (new Date()).getFullYear()],
        hideHover: 'auto',
        resize: true
    });

	    Morris.Bar({
        element: 'morris-bar-chartsat',
        data: [{
            y: 'Ocak',
            a: satyil1[1],
            b: satyil2[1]
        }, {
            y: 'Şubat',
            a: satyil1[2],
            b: satyil2[2]
        }, {
            y: 'Mart',
            a: satyil1[3],
            b: satyil2[3]
        }, {
            y: 'Nisan',
            a: satyil1[4],
            b: satyil2[4]
        }, {
            y: 'Mayıs',
            a: satyil1[5],
            b: satyil2[5]
        }, {
            y: 'Haziran',
            a: satyil1[6],
            b: satyil2[6]
        }, {
            y: 'Temmuz',
            a: satyil1[7],
            b: satyil2[7]
		}, {
            y: 'Ağustos',
            a: satyil1[8],
            b: satyil2[8]
		}, {
            y: 'Eylül',
            a: satyil1[9],
            b: satyil2[9]
		}, {
            y: 'Ekim',
            a: satyil1[10],
            b: satyil2[10]
		}, {
            y: 'Kasım',
            a: satyil1[11],
            b: satyil2[11]		
		}, {
            y: 'Aralık',
            a: satyil1[12],
            b: satyil2[12]
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: [(new Date()).getFullYear()-1, (new Date()).getFullYear()],
        hideHover: 'auto',
        resize: true
    });
	
});
