<div>
<style></style>

    <div class="row layout-top-spacing">
        <div class="col-sm-12 col-md-8">
            <!-- DETALLES -->
            @include('livewire.pos.partials.detail')
        </div>
        <div class="col-sm-12 col-md-4">
            <!-- TOTAL -->
            @include('livewire.pos.partials.total')
            <!-- DENOMINATIONS -->
            {{-- @include('livewire.pos.partials.coins') --}}
            @include('livewire.pos.partials.asign')
        </div>
    </div>
</div>
<script src="{{ asset('js/keypress.js') }}"></script>
<script>

</script>
