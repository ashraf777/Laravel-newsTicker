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
                <li>News Tricker</li>
                <li class="active">News Tricker list</li>
            </ol>
        </section>
        <section class="content paddingleft_right15">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary"> <!-- app.css panel-default-->
                    <div class="panel-heading">
                    <h4 class="panel-title">
                        News Tricker
                    </h4>
                </div>
                        <div class="panel-body">
                           <div class="dataTables_wrapper no-footer" id="table_wrapper">
                            <div class="table-responsive"> 

                                @if ($newsT->count())
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Details</th>
                                                <th>Priority</th>
                                                <th>Active</th>
                                                <th colspan="2">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($newsT as $tricker)
                                                <tr>
                                                    <td>{{ $tricker->title }}</td>
                                                    <td>{{ $tricker->details }}</td>
                                                    <td>{{ $tricker->priority }}</td>
                                                    <td>
                                                        @if($tricker->is_active)
                                                            {!! Form::checkbox('active', '1', true, array('class' => 'pos-rel p-l-30')); !!}
                                                        @else
                                                            {!! Form::checkbox('active', '1', false, array('class' => 'pos-rel p-l-30')); !!}
                                                        @endif
                                                    </td>
                                                    <td width="10">{!! link_to_route('newsTricker.edit', 'Edit', array($tricker->id), array('class' => 'btn btn-warning')) !!}</td>
                                                    <td width="10">
                                                        {!! Form::open(array('method' => 'DELETE', 'route' => array('newsTricker.destroy', $tricker->id))) !!}
                                                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                    {!! $newsT !!}
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    There are no News Tricker
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
    @endsection 
@endsection
