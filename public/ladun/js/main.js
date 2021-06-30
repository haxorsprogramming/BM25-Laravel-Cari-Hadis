// route 
var rToBeranda = server + "beranda";

// vue object 
var app = new Vue({
    el : '#app',
    data : {},
    methods : {
        dashboardAtc : function()
        {
            $("#divUtama").load(rToBeranda);
        }
    }
});

// inisialisasi 
$("#divUtama").load(rToBeranda);