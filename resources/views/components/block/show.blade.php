<div>
    <block>
        {!! $block->html !!}
    </block>

    @push('style')
        <style>
            {!! $block->css !!}
        </style>
    @endpush
</div>
