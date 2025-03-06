@extends('admin.layouts.app')
@section('title')
    @lang("Agent List")
@endsection
@section('content')
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="{{ route('admin.users.search') }}" method="get">
                    <div class="row">


                        <div class="col-md-2">
                            <div class="form-group">

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                    <i
                                        class="fas fa-plus"></i> Create New
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agents as $agent)
                        <tr>
                            <th scope="row">{{$agent->firstname}}</th>
                            <td>{{$agent->lastname}}</td>
                            <td>{{$agent->username}}</td>
                            <td>{{$agent->email}}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#agentEdit{{$agent->id}}"><i class="fas fa-edit"></i></button>
                                {{--                                <button class="btn btn-sm btn-danger" data-toggle="modal"--}}
                                {{--                                        data-target="#agentDelete{{$agent->id}}"><i class="fas fa-trash"></i></button>--}}
                            </td>
                        </tr>

                        <div class="modal fade" id="agentEdit{{$agent->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Agent</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.agent.update')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="firstname"
                                                           value="{{$agent->firstname}}">

                                                    <input type="hidden" class="form-control" name="agent_edit_id"
                                                           value="{{$agent->id}}">
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="lastname"
                                                           value="{{$agent->lastname}}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label>User Name</label>
                                                    <input type="text" class="form-control" name="username"
                                                           value="{{$agent->username}}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                           value="{{$agent->email}}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="agentDelete{{$agent->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Agent</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.agent.delete')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>are you sure to dele this agent ?</label>

                                                    <input type="hidden" class="form-control" name="agent_delete_id"
                                                           value="{{$agent->id}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.agent.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstname">
                            </div>
                            <div class="col-md-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastname">
                            </div>

                            <div class="col-md-12">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="username">
                            </div>

                            <div class="col-md-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>

                            <div class="col-md-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
