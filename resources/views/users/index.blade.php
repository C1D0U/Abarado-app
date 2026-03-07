<x-layout>

<x-slot name="heading">
    User List
</x-slot>

<div class="container">
    <table class="table table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['gender'] }}</td>
            </tr>
            @endforeach

        </tbody>

    </table>
</div>

</x-layout>