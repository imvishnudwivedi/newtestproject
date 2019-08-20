$(function(){
  $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
  });

  $("form[data-confirm]").submit(function() {
    $('body').css('opacity','0.1');
      if (!confirm($(this).attr("data-confirm"))) {
        $('body').css('opacity','1');
        return false;
      }
  });

  // $(document.body).append('<div id="preloader"><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div></div>');
  $(document.body).append('<div id="preloader"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></div>');
   $(document).ajaxStop(function () {
        $('#preloader').hide();
    });

    $(document).ajaxStart(function () {
        $('#preloader').show();
    });
  $('#preloader').hide();

  $('#hide_unhide').click(function(event) {
      $('#btn-sh').text(function(i, text){
          if(text==='Hide Grids'){
            $('#view').removeClass('table-dark-bordered');
          }else{
            $('#view').addClass('table-dark-bordered');
          }
          return text === "Hide Grids" ? "Show Grids" : "Hide Grids";

      })
      

       
    });

  
  Date.prototype.getMonthName = function(lang) {
      lang = lang && (lang in Date.locale) ? lang : 'en';
      return Date.locale[lang].month_names[this.getMonth()];
  };

  Date.prototype.getMonthNameShort = function(lang) {
      lang = lang && (lang in Date.locale) ? lang : 'en';
      return Date.locale[lang].month_names_short[this.getMonth()];
  };

  Date.locale = {
      en: {
         month_names: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
         month_names_short: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      }
  };

  Date.prototype.sameDay = function(d) {
  return this.getFullYear() === d.getFullYear()
    && this.getDate() === d.getDate()
    && this.getMonth() === d.getMonth();
  }

});

function getFormatedDate(date)
{
  var d=new Date(date);
  var day=d.getDate();
  var month=d.getMonthNameShort();
  var y=d.getFullYear();

  return (day+'-'+month+'-'+y);

}

function getYearMonth(date)
{
  var d=new Date(date);
  var day=d.getDate();
  // var month=d.getMonthNameShort();
  var m=d.getMonth();
  var y=d.getFullYear();

  return (y+''+(("0" + (m + 1)).slice(-2)));

}

function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}

function convertTallyDate(tally_date){
  tally_date=''+tally_date;
  var year=tally_date.slice(0, 4);
  var month=tally_date.slice(4, 6);
  
  var day=tally_date.slice(6, 8);
  // console.log(year+'-'+month+'-'+day);
  var d=new Date(year+'-'+month+'-'+day);
  var day=d.getDate();
  var month=d.getMonthNameShort();
  var y=d.getFullYear();

  return (day+'-'+month+'-'+y);
}

function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function ColorLuminance(hex, lum) {

  // validate hex string
  hex = String(hex).replace(/[^0-9a-f]/gi, '');
  if (hex.length < 6) {
    hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
  }
  lum = lum || 0;

  // convert to decimal and change luminosity
  var rgb = "#", c, i;
  for (i = 0; i < 3; i++) {
    c = parseInt(hex.substr(i*2,2), 16);
    c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
    rgb += ("00"+c).substr(c.length);
  }

  return rgb;
}