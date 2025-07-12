<div>
    <button wire:click="pay" class="btn btn-primary">Pay with GCash</button>

    @if($checkoutUrl)
        <script>
            window.open('{{ $checkoutUrl }}', '_blank');
        </script>
    @endif
</div>
