<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes - Laravel + MariaDB starter</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 40rem; margin: 3rem auto; padding: 0 1rem; color: #1f2937; }
        h1 { font-size: 1.6rem; margin-bottom: .25rem; }
        p.sub { color: #6b7280; margin-top: 0; }
        form { display: flex; gap: .5rem; margin: 1.5rem 0; }
        input[type=text] { flex: 1; padding: .6rem .8rem; border: 1px solid #d1d5db; border-radius: .5rem; font-size: 1rem; }
        button { padding: .6rem 1rem; border: 0; border-radius: .5rem; background: #ef4444; color: #fff; font-size: 1rem; cursor: pointer; }
        li { padding: .5rem 0; border-bottom: 1px solid #f3f4f6; }
        small { color: #9ca3af; }
        .err { color: #b91c1c; }
    </style>
</head>
<body>
    <h1>Notes</h1>
    <p class="sub">Laravel {{ app()->version() }} on {{ ['mariadb' => 'MariaDB', 'mysql' => 'MySQL', 'pgsql' => 'PostgreSQL', 'sqlite' => 'SQLite'][DB::connection()->getDriverName()] ?? DB::connection()->getDriverName() }}. Each note is a row in the <code>notes</code> table. <a href="/status">/status</a></p>

    <form method="post" action="/notes">
        @csrf
        <input type="text" name="text" placeholder="Write a note" maxlength="500" required autofocus>
        <button type="submit">Add</button>
    </form>
    @error('text') <p class="err">{{ $message }}</p> @enderror

    <ul>
        @forelse ($notes as $note)
            <li>{{ $note->text }} <small>{{ $note->created_at->diffForHumans() }}</small></li>
        @empty
            <li><small>No notes yet. Add the first one above.</small></li>
        @endforelse
    </ul>
</body>
</html>
