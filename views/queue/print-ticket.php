<?php
use yii\bootstrap\BootstrapAsset;
use app\assets\JsBarcodeAsset;
use yii\web\View;

JsBarcodeAsset::register($this);

$this->registerCssFile(YII_ENV_DEV ? "@web/css/80mm.css" : "@web/css/80mm.min.css", [
  'depends' => [BootstrapAsset::className()],
]);
$this->registerCss(<<<CSS
.row {
margin: auto !important;
}
.qrcode img {
  margin: auto;
  display: -webkit-inline-box;
}
.barcode img {
  margin: auto;
  display: -webkit-inline-box;
}
@media print {
  .qrcode img {
      margin: auto;
      display: -webkit-inline-box;
  }
  .barcode img {
      margin: auto;
      display: -webkit-inline-box;
  }
}
CSS
);
// $this->registerJs(
//   "var copy = " . $copy . ";",
//   View::POS_HEAD
// );
?>

<?= $template ?>

<?php
$this->registerJsFile(
    '@web/js/qrcode.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJs(<<<JS
document.title = 'พิมพ์บัตรคิว';

$('p[data-f-id="pbf"]').remove()
$(window).on('load', function() {
    window.print();
    window.onafterprint = function(){
        window.close();
    }
});
JS
);
/* for (x = 0; x < copy; x++) {
    // qrcode
    if($("#qrcode"+x)) {
        new QRCode(document.getElementById("qrcode"+x), {
            text: window.location.origin + '/app/queue/scan-qrcode?id='+ {$queueDetail->queue_detail_id},
            width: 100,
            height: 100,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    }
    if ($("#barcode"+x)){
        JsBarcode("#barcode"+x, '{$patient->hn}', {
            format: "CODE128A",
            width: 2,
            height: 100,
            margin: 0
        });
    }
} */
?>