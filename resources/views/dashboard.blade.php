<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi... {{ Auth::user()->name }}
            Total Users <span class="badge badge-denger">{{ count($user) }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="Container">
          <div class="row">
              <div class="col">
                  @php($i = 1)
                    <table class="table">
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
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
    </div>
</x-app-layout>
