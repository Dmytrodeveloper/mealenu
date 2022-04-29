@include('layouts.header')
<link
    href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

@section('title', 'Home')

<style>
    td .p {
        font-size: 14px !important;
    }
    .edit-content-position, .remove-content-position{
        cursor: pointer;
    }
    .remove-icon-position{
        position: absolute;
        top: -10px;
        right: 0px;
        cursor: pointer;
        display: none;
    }
    .edit-icon-position{
        position: absolute;
        top: -10px;
        right: 30px;
        cursor: pointer;
        display: none;
    }
    .nav-tabs .nav-item:hover .remove-icon-position, .nav-tabs .nav-item:hover .edit-icon-position{
        display: block;
    }

</style>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts.nav')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.layout')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row d-flex justify-content-between align-items-center">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0" style="text-transform: capitalize;">
                                {{ $pagename }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/menupage">Menupage</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">{{ $pagename }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">{{ $page_id }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-2">
                    
                </div>
            </div>
            <div class="content-body">
                <section id="nav-tabs-aligned">
                    <div class="row match-height">
                        <!-- Centered Aligned Tabs starts -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                                        <div>
                                            <div class="form-modal-ex">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cate-create">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                        @foreach ($categories as $category)
                                            <li class="nav-item">
                                                <a class="nav-link {{$category->id == $firstid ? 'active' : ''}}" id="tab-category-{{$category->id}}" data-toggle="tab" href="#category-{{$category->id}}" aria-controls="category-{{$category->id}}" role="tab" aria-selected="true">
                                                    {{$category->name}}
                                                </a>
                                                <i data-feather='edit-2' class="edit-icon-position" data-id="{{$category->id}}" data-name="{{$category->name}}"></i>
                                                <i data-feather='x' class="remove-icon-position" data-id="{{$category->id}}"></i>
                                            </li>
                                        @endforeach
                                        
                                    </ul>
                                    <div class="tab-content mt-3">
                                        @foreach ($categories as $category)
                                            <div class="tab-pane {{$category->id == $firstid ?'active' : ''}}" id="category-{{$category->id}}" role="tabpanel">
                                                <p>
                                                    <h2 id="content-all-title-{{$category->id}}">{{$category->name}}</h2>
                                                    <button type="button" class="btn btn-primary btn-add-content" data-toggle="modal" data-category_id="{{$category->id}}">Add</button>
                                                </p>

                                                <table class="table">
                                                    <tbody class="content-tpage">
                                                        @foreach ($category->contents as $content)
                                                            <tr>
                                                                <td>
                                                                    <h4 id="content-title-{{$content->id}}">{{$content->title}}</h4>
                                                                    <p id="content-desc-{{$content->id}}">{{$content->description}}</p>
                                                                </td>
                                                                <td id="content-num-{{$content->id}}">{{$content->number}}</td>
                                                                <td>
                                                                    <i data-feather='edit-2' class="edit-content-position" id="edit-content-position{{$content->id}}" data-id="{{$content->id}}" data-title="{{$content->title}}" data-description="{{$content->description}}" data-number="{{$content->number}}"></i>
                                                                    <i data-feather='x' class="remove-content-position ml-1" data-id="{{$content->id}}"></i>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Centered Aligned Tabs ends -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Modal -->
    <div class="modal fade text-left" id="modal-cate-create" tabindex="-1" role="dialog" aria-labelledby="create-category" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-category">Category</h4>
                    <button type="button" class="close category-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="form-cate-create">
                    <div class="modal-body">
                        <label>Category Name: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Category" class="form-control category-text" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-add-category">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Content MODAL CREATE --}}
    <!-- Modal -->
    <div class="modal fade text-left" id="modal-content-create" tabindex="-1" role="dialog" aria-labelledby="create-content" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-content">Content</h4>
                    <button type="button" class="close content-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="form-content-create">
                    <div class="modal-body">
                        <label>Title: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Title" class="form-control" id="con-title" required/>
                            <input type="hidden" id="cate_con_id"/>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label>Content: </label>
                        <textarea class="form-control" id="con-desc" rows="3" placeholder="Content..."></textarea>
                    </div>
                    <div class="modal-body">
                        <label>Price: </label>
                        <div class="form-group">
                            <input type="number" step="0.01" placeholder="27.5" class="form-control" id="con-num" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Category Modal Update --}}
    <div class="modal fade text-left" id="edit-cate-modal" tabindex="-1" role="dialog" aria-labelledby="update-category" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="update-category">Update Category</h4>
                    <button type="button" class="close category-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="form-cate-edit">
                    <div class="modal-body">
                        <label>Category Name: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Category" id="u-category" class="form-control" required/>
                            <input type="hidden" id="cate_id" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Content MODAL Update--}}
    <div class="modal fade text-left" id="edit-content-modal" tabindex="-1" role="dialog" aria-labelledby="update-content" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="update-content">Content</h4>
                    <button type="button" class="close content-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="form-cont-edit">
                    <div class="modal-body">
                        <label>Title: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Title" class="form-control" id="ucon-title" required/>
                            <input type="hidden" id="ucon_id"/>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label>Content: </label>
                        <textarea class="form-control" id="ucon-desc" rows="3" placeholder="Content..."></textarea>
                    </div>
                    <div class="modal-body">
                        <label>Price: </label>
                        <div class="form-group">
                            <input type="number" step="0.01" placeholder="27.5" class="form-control" id="ucon-num" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')
    <script>
        '@if (session()->has('message'))<div class="alert alert-success">' + toastr["success"]("{{ session()->get('message') }}") + '</div>@endif';

        // Category
        $(document).on('submit', '.form-cate-create', function(e){
            var category_text = $('.category-text').val();
            var url = '{{route('category.create')}}';
            var page_id = '{{$page_id}}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {name : category_text, page_id : page_id},
                success: function(data) {
                    if(data['success']){
                        $('#modal-cate-create').modal('hide');
                        $('.category-text').val('');
                        var id = data['success'];
                        $('.nav-tabs').append("<li class='nav-item'><a class='nav-link' id='tab-category-"+id+"' data-toggle='tab' href='#category-"+id+"' aria-controls='category-"+id+"' role='tab' aria-selected='false'>"+category_text+"</a><i data-feather='edit-2' class='edit-icon-position' data-id="+id+" data-name="+category_text+"></i><i data-feather='x' class='remove-icon-position' data-id="+id+"></i></li>");
                        
                        $('.tab-content').append("<div class='tab-pane' id='category-"+id+"' aria-labelledby='tab-category-"+id+"' role='tabpanel'><p><h2 id='content-all-title"+id+"'>"+category_text+"</h2><button type='button' class='btn btn-primary btn-add-content' data-toggle='modal' data-category_id="+id+">Add</button></p><table class='table'><tbody></tbody></table></div>");
                        feather.replace();
                    }
                    else{
                        
                    }
                }
            });
        });

        $(document).on('click', '.remove-icon-position', function(e){
            var id = $(this).data('id');
            $(this).parent().remove();
            $('#category-'+id).remove();
            var url = '{{route("category.remove")}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {id : id},
                success: function(data) {
                    if(data['success']){
                        toastr["success"]("Removed Successfully.");
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
        
        });

        $(document).on('click', '.edit-icon-position', function(e){
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#u-category').val(name);
            $('#edit-cate-modal').modal('show');
            $('#cate_id').val(id);
            console.log('id------->', id);
        });

        $('.form-cate-edit').on('submit', function(e){
            console.log('edit--->cate -->');
            var category_text = $('#u-category').val();
            var url = '{{route("category.update")}}';
            var id = $('#cate_id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {name : category_text, id : id},
                success: function(data) {
                    if(data['success']){
                        console.log('success');
                        $('#tab-category-'+id).text(category_text);
                        $('#content-all-title-'+id).text(category_text);
                        $('#edit-cate-modal').modal('hide');
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
            
        });

        // Content
        $(document).on('click', '.btn-add-content', function(e){
            var category_id = $(this).data('category_id');            
            $('#cate_con_id').val(category_id);
            console.log('value--->', $('#cate_con_id').val());
            $('#modal-content-create').modal('show');
        });

        $(document).on('submit', '.form-content-create', function(e){
            var category_id = $('#cate_con_id').val();
            var title = $('#con-title').val();
            var description = $('#con-desc').val();
            var number = $('#con-num').val();

            $('.content-modal-close').click();
            
            var url = '{{route("content.create")}}';
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {title : title, category_id : category_id, description : description, number : number},
                success: function(data) {
                    if(data['success']){
                        console.log('successly saved content');
                        var id = data['success'];

                        $("#category-"+category_id+" .table").append("<tbody class='content-tpage"+category_id+"'><tr><td><h4 id='content-title-"+id+"'>"+title+"</h4><p id='content-desc-"+id+"'>"+description+"</p></td><td id='content-num-"+id+"'>"+number+"</td><td><i data-feather='edit-2' class='edit-content-position' id='edit-content-position"+id+"' data-id='"+id+"' data-title='"+title+"' data-description='"+description+"' data-number='"+number+"'></i><i data-feather='x' class='remove-content-position ml-1' data-id='"+id+"'></i></td></tr></tbody>");
                        feather.replace();
                        $('#cate_con_id').val('');
                        $('#con-title').val('');
                        $('#con-desc').val('');
                        $('#con-num').val('');
                                      
                    }
                    else{
                        toastr["error"]("Error.");
                    }
                }
            });
        });

        $(document).on('click', '.remove-content-position', function(e){
            var id = $(this).data('id');
            var url = "{{route('content.remove')}}";
            $(this).parent().parent().remove();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                data: {id : id},
                url: url,
                success: function(data) {
                    if(data['success']){
                        toastr["success"]("Removed Successfully.")
                    }
                    else{
                    }
                }
            });
        });

        $(document).on('click', '.edit-content-position', function(e){
            var id = $(this).data('id');
            var title = $(this).attr('data-title');
            var description = $(this).attr('data-description');
            var number = $(this).attr('data-number');
            
            $('#ucon-title').val(title);
            $('#ucon-desc').val(description);
            $('#ucon-num').val(number);
            $('#ucon_id').val(id);

            $('#edit-content-modal').modal('show');

        });

        $('.form-cont-edit').on('submit', function(e){
                var utitle = $('#ucon-title').val();
                var udescription = $('#ucon-desc').val();
                var unumber = $('#ucon-num').val();
                var id = $('#ucon_id').val();
                
                var url = '{{route("content.update")}}';         

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    data: {title : utitle, id : id, description : udescription, number : unumber},
                    success: function(data) {
                        if(data['success']){
                            $('#edit-content-modal').modal('hide')
                            $('#content-title-'+id).text(utitle);
                            $('#content-desc-'+id).text(udescription);
                            $('#content-num-'+id).text(unumber);
                            $('#edit-content-position'+id+'').attr('data-title', utitle);
                            $('#edit-content-position'+id+'').attr('data-description', udescription);
                            $('#edit-content-position'+id+'').attr('data-number', unumber);
                            feather.replace();
                        }
                        else{
                            toastr["error"]("Error.");
                        }
                    }
                });
                
            });
    </script>
</body>
