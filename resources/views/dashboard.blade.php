<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi... {{ Auth::user()->name }} 
            <span style="float:right">
                Total Users <span class="badge bg-danger">{{ Count($users) }}</span> 
            </span>
        </h2>
    </x-slot>
        <div class="py-5">
                    <div class="container">
                <div class="row">
                    <div class="col">
                        @php($i = 1)
                            <table class="table table-hover table-striped table-bordered border-primary table-responsive">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{  $i++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
     

</x-app-layout>
