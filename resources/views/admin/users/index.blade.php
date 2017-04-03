@extends('layouts.admin')
@section('content')
    <script>
        function search_page(page) {
            search_ajax(page.id);
        }
        function search() {
            if (!$('#search').val())
                location.href = window.location.pathname;
            search_ajax();
        }
        function search_ajax(page_id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/api/search?page=' + page_id,
                type: 'GET',
                data: {_token: CSRF_TOKEN, data: $('#search').val()},
                success: function (datas) {
                    console.log(datas);
                    var html = "";
                    var page = "";
                    var nextpage = datas.current_page + 1;
                    $('#data_putout').empty();
                    $('.pagination').empty();
                    datas.data.forEach(function (entry) {
                        var Role;
                        if (entry.role_id == 1)
                            Role = "administrator";
                        else if (entry.role_id == 2)
                            Role = "subscribe";
                        else
                            Role = "author";
                        html += "<tr>";
                        html += "<td>" + entry.id + "</td>";
                        var i = 1;
                        if (entry.photo_id)
                            html += '<td><img src="' + entry.photo_id + '"height ="50" alt="" </td>';
                        else
                            html += '<td><img src="http://placehold.it/400x400" height ="50"  alt=""></td>';

                        html += '<td><a href="{{URL::to('/')}}/admin/users/' + entry.id + '/edit">' + entry.name + '</a></td>';
                        html += "<td>" + entry.email + "</td>";
                        html += "<td>" + Role + "</td>";
                        html += "<td>" + entry.is_active + "</td>";
                        html += "<td>" + entry.created_at + "</td>";
                        html += "<td>" + entry.updated_at + "</td>";
                        html += "<td>";
                    });
                    page = '<ul class="pagination">';
                    if (page_id && page_id - 1 != 0)
                        page += '<li onclick="search_page(this)" id=' + (page_id - 1) + '><a href="#">«</a></li>';
                    else
                        page += '<li  class="disabled"><span>«</span></li>';
                    for (var i = 1; i <= datas.last_page; i++) {
                        if (i == 1 && !page_id) {
                            page += '<li class="active"><span>1</span></li>';
                            continue;
                        }
                        if (i == page_id)
                            page += '<li class="active"><a id=' + i + ' onclick="search_page(this)" href="#">' + i + '</a></li>';
                        else
                            page += '<li><a id=' + i + ' onclick="search_page(this)" href="#">' + i + '</a></li>';

                    }
                    (datas.next_page_url) ?
                        page += '<li onclick="search_page(this)" id=' + nextpage + '><a href="#"  rel="next">»</a></li>'
                        : page += '<li class="disabled"><a href="#" rel="next">»</a></li>'
                    page += '</ul>';
                    $('#data_putout').append(html);
                    $('.pagination').append(page);
                }
            });
        }
    </script>
    <div class="row">
        <div class="col-sx-6 col-sm-8"><h1>Users</h1></div>
        <div class="col-sx-6 col-sm-4">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input id="search" type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button onclick="search()" class="btn btn-default" type="button">
                               <i class="fa fa-search"></i>
                         </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
        </div>
    </div>
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody id="data_putout">
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file:'http://placehold.it/400x400'}}"
                             alt=""></td>
                    <td><a href={{route('admin.users.edit',$user->id)}}>{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active==1 ?'Active':'Not Active'}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$users->render()}}
        </div>
    </div>
@stop
