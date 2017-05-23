<table class="table">
    <thead>
        <tr>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Groep</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $item)
            <tr>
                <td>{{{ $item->firstname }}}</td>
                <td>{{{ $item->lastname }}}</td>
                <td>{{{ $item->email }}}</td>
                <td>{{ $item->group->name }}</td>
				<td>{{ link_to_route('admin.users.edit', 'Aanpassen', array($item->id)) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
