@extends('layouts.app')
@push('css-script')
<style>
    .invalid{
        color:red;
    }
</style>
@endpush
@section('content')
<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Process</h4>
                                    {{$mode}}
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                    @if($mode=='Edit')
                                        <form class="form form-vertical" id="process" method="post" action="/process/update">
                                            <input type="hidden" name="id" value="{{$process->id}}">
                                    @else
                                    <form class="form form-vertical" id="process" method="post" action="/process/save">
                                    @endif
                                        @csrf
                                        <div class="form-body">
                                            
                                                <div class="row col-8">
                                              
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Process Name</label>
                                                            <input type="text" id="name" value="{{old('name',$process->process_name)}}"
                                                                class="form-control" name="name"
                                                                placeholder="Process Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Order</label>
                                                            <input type="text" id="order" value="{{old('order',$process->order)}}"
                                                                class="form-control" name="order"
                                                                placeholder="Order">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class='form-check'>
                                                            <div class="checkbox mt-2">
                                                            @if($mode=='Edit')
                                                            <input type="checkbox" name="status" class="form-check-input" {{ ($process->isactive=='1') ? 'checked' : ''}} > IsActive
                                                            @else
                                                            <input type="checkbox" name="status" class="form-check-input"  checked="checked" > IsActive
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
@stop

    @push('js-plugin')
    <script src="{{asset('./js/jquery.validate.min.js')}}"></script>
    @endpush
    @push('js-script')
    <script>
(function ($) {

"use strict";
$("#process").validate({
    rules: {
        name: {
            required: true,
        },
        order: {
             required: true,
             number:true
         }
    },
    messages: {
        name: {
            required: 'This field is Required ',
        },
        order: {
             required: 'This field is Required ',
             number:'Only Number Allowed'
        }
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element.parent());
    }
});
})(jQuery);
</script>
@endpush