<script>
  try{
    onScan.attachTo(document,{
        suffixKeyCodes:[13],
        onScan: function(barcode){
            console.log(barcode)
            window.livewire.emit('scan-code',barcode)
        },
        onScanError: function(e){
            console.Log(e)
        }
    })
    console.Log('Scanner ready!')
  }catch(e){
    console.Log('Error de lectura: ',e)
  }
</script>
