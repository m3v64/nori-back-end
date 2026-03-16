<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu Data</title>
</head>
<body>
	<h1>Menu Data (dishes table)</h1>

	@if ($menus->isEmpty())
		<p>No menu items found in the database.</p>
	@else
		<p>Total items: {{ $menus->count() }}</p>

		<table border="1" cellpadding="6" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Restaurant ID</th>
					<th>Name</th>
					<th>Ingredients</th>
					<th>Allergies</th>
					<th>Price</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($menus as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->restaurant_id }}</td>
						<td>{{ $item->name }}</td>
						<td>{{ $item->ingredients }}</td>
						<td>{{ $item->allergies ?? '-' }}</td>
						<td>{{ $item->price/100 }}</td>
						<td>{{ $item->created_at }}</td>
						<td>{{ $item->updated_at }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
</body>
</html>
