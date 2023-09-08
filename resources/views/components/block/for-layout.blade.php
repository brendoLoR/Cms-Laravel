<div>
    @foreach($blocks as $block)
        <x-block.show :block="$block" />
    @endforeach
</div>
