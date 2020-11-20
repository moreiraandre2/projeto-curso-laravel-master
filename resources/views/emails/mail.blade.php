<h2>Alunos em viagem: </h2>
<ul>
  @foreach ($fieldWorkStudents as $student)
  <li>{{ $student->name }} - RA: {{ $student->ra }}</li>
@endforeach
</ul>
<hr>
<h3>Data da Viagem: {{ date('d/m/Y', strtotime($travelDate[0]->travel_date)) }}</h3>
<h3>Dia da Semana: {{ $travelDayName }}</h3>
<hr>
<h2>Professores que ministram aula neste dia:</h2>
<ul>
  @foreach($findTeacherByWeeklyDay as $teacher)
    <li>Professor: {{ $teacher->name }} - Email: {{ $teacher->email }}</li>
  @endforeach
</ul>
