@extends('admin.master')

@section('title')
    Manage Blog
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Blog</h4>
                    </div>
                    <div class="card-body">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Blog Title</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
{{--                                        @php--}}
{{--                                            $category = \App\Models\Category::find($blog->category_id)->category_name;--}}
{{--                                        @endphp--}}
                                        <td>{{ $blog->category->category_name }}</td>
                                        <td>{{ $blog->blog_title }}</td>
                                        <td>
                                            <img src="{{ $blog->blog_image }}" style="height: 100px; width: 100px;" alt="">
                                        </td>
                                        <td>{!! $blog->blog_content !!}</td>
                                        <td>{{ $blog->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-{{ $blog->status == 1 ? 'info' : 'warning' }}">
                                                <i class="fa-solid fa-arrow-{{ $blog->status == 1 ? 'down' : 'up' }}"></i>
                                            </a>
                                            <a href="{{ route('edit-blog', ['id' => $blog->id, 'title' => str_replace(' ', '-', $blog->blog_title)]) }}" class="btn btn-sm btn-secondary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('deleteForm').submit()">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                            <form action="{{ route('delete-blog', ['id' => $blog->id]) }}" method="post" id="deleteForm">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
