<!-- 404 vs 403 Confusion -->
=> If the project is not found ($project == null), it should return a 404 Not Found, not a 403 Unauthorized.


<!-- code   -->
public function show($id)
{
    $project = Project::find($id);
    if (!$project || $project->user_id != auth()->id()) {
    abort(403, "Unauthorized");
    }
    return response()->json($project->tasks);
}

<!-- Update code  -->

public function show($id){
    $project = Project::find($id);

    if(empty($project)){
        abort(404, 'Project not found.');
    }

    if($project->user_id != auth()->id()){
        abort(403, "Unauthorized");
    }
    return response()->json($project->tasks);
}

<!-- After fix the code -->

=> Now if empty($project) then abort 404. and if  if($project->user_id != auth()->id()) then abort 403.