@extends('layout.app')


@section('content')
    <gjs-editor
        load-url="{{route('api.block.edit', ['block' => $blockId])}}"
        save-url="{{route('api.block.update', ['block' => $blockId])}}"
        asset-url="{{route('api.asset.store')}}"
        block-id="{{$blockId}}"></gjs-editor>
@endsection
