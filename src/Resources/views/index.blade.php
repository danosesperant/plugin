<!-- src/Resources/views/voitures/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Voitures</title>
</head>
<body>
    <h1>Liste des voitures</h1>
    <a href="{{ route('voitures.create') }}">Ajouter une voiture</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Année</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voitures as $voiture)
                <tr>
                    <td>{{ $voiture->id }}</td>
                    <td>{{ $voiture->marque }}</td>
                    <td>{{ $voiture->modele }}</td>
                    <td>{{ $voiture->annee }}</td>
                    <td>{{ $voiture->prix }}</td>
                    <td>
                        <a href="{{ route('voitures.show', $voiture->id) }}">Voir</a>
                        <a href="{{ route('voitures.edit', $voiture->id) }}">Modifier</a>
                        <form action="{{ route('voitures.destroy', $voiture->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
