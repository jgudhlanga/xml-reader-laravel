@extends('xml-digest::layouts.main')
@section('title')
    Home
@endsection

@section('content')
<div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr style="background-color: blue; color: white;">
                    <th>Title</th><th>Description</th><th>Launch Url</th><th>Icon Url</th>
                </tr>
            </thead>
            @foreach($data as $row)
            <tr>
                <td>{{$row->title}}</td><td>{{$row->description}}</td>
                <td>{{$row->launch_url}}</td><td>{{$row->icon_url}}</td>
            </tr>
            @endforeach
        </table>
    </div>
<div class="col-md-12">
    <form method="post" enctype="multipart/form-data" action="{{route('postXml')}}" class="form">
         {{csrf_field()}}
         <h2 class="text-primary">Upload Data</h2>
         <div class="col-md-12">
            <label>Select XML File: </label>
            <input type="file" name="file"/>
        </div>
         <div class="col-md-12" style="margin-top: 20px !important">
            <button class="btn btn-primary" type="submit">Load Data</button>
        </div>
    </form>
</div>

@endsection
