=> Analyze Query Count


$projects = Project::with('tasks')->get();
foreach ($projects as $project) {
    foreach ($project->tasks as $task) {
        echo $task->title;
    }
}


Question: How many database queries will run if there are 10 projects and each project has 5 tasks?

=> 2 queries
=> When run the first query, will get all the projects, and when  run the second query, we will get the tasks related to each project.
