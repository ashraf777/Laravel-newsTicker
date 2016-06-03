@extends('app')
@section('content')
    @section('right')
    <aside class="right-side">
        <section class="content-header">
            <h1>News Ticker</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#admin/users/index">
                        <i class="livicon" data-color="#000" data-name="home" data-size="16" id="livicon-46" style="width: 16px; height: 16px;"></i>
                        Dashboard 
                    </a>
                </li>
                <li>Article</li>
                <li class="active">Add News Ticker</li>
            </ol>
        </section>
        <section class="content paddingleft_right15">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add New News Ticker</h4>
                        </div>
                        <div class="panel-body">
                                <div class="error-panel">
                                    @if ($errors->any() )
                                        <ul>
                                            {!! implode('', $errors->all('<li class="errors">:message</li>'))  !!}
                                        </ul>
                                    @endif 
                                </div>
                                <div class="table-responsive"> 
                                    <div class="content clearfix">
                                    {!! Form::open(array('route' => 'newsTricker.store')) !!}
                                        <div class="form-group">
                                            {!! Form::label('title', 'Title:', array('class' => 'col-sm-2 control-label')) !!}
                                            <div class="col-sm-10">
                                                {!! Form::text('title', null, array('class' => 'form-control required', 'placeholder'=>'News Ticker title')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('details', 'Details:', array('class' => 'col-sm-2 control-label')) !!}
                                            <div class="col-sm-10">
                                                {!! Form::textarea('details', null, array('style' => 'width: 100%; height: 104px;')) !!}
                                            </div>
                                        </div>
<!--                                         <div class="form-group">
                                            <div class="col-sm-2">
                                                {!! Form::label('priority', 'Priority:', array('class' => 'col-sm-1 control-label')) !!}
                                            </div>
                                            <div class="col-sm-8" style="margin-left: 2px;">
                                                {!! Form::select('priority', array('' => 'Select', '1' => 'High', '2' => 'Medium', '3' => 'low'), null, array('class' => 'form-control required')) !!}
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            {!! Form::label('active', 'Active:', array('class' => 'col-sm-2 control-label')) !!}
                                            <div class="col-sm-10">
                                                {!! Form::checkbox('active', '1', true, array('class' => 'pos-rel p-l-30')); !!}
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 4px;">
                                            <div class="form-group">
                                            <label class="col-sm-4 control-label"></label>
                                                <div class="col-sm-6" >
                                                    {!! Form::button('Cancel', array('class' => 'btn btn-danger')) !!}
                                                    {!! Form::submit('Submit', array('class' => 'btn btn-success')) !!}
                                                </div>
                                            </div>
                                        </div>                                        
                                    {!! Form::close() !!}

                                    @if ($errors->any())
                                        <ul>
                                            {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                                        </ul>
                                    @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
    @endsection
@endsection
