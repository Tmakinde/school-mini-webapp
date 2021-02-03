

<?php
/*{
    "firstname": "Tolu",
    "lastname": "Makinde",
    "class_id": 1,
    "class_position": 6,
    "subjects": [
        {
            "name": "Physics",
            "test_score": 35,
            "exam_score": 78,
            "position": 4
        },
        {
            "name": "Maths",
            "test_score": 55,
            "exam_score": 34,
            "position": 2
        },
        {
            "name": "Chemistry",
            "test_score": 12,
            "exam_score": 78,
            "position": 1
        },
    ]
}
$user = User::with('subjects.results', function ($q) {
    $q->orderByDesc('total_score');
})->get();

//Add this to user model
public function subjects() 
{
    return $this->belongsToMany('subjects', 'results')->withPivot('test_score', 'exam_score');
}

foreach ($user->subjects as $subject) {
    $subject->pivot->test_score;
    $subject->pivot->exam_score;
    $user->getPosition($subject->id);
}


// Add this to the User Model.
public function getPosition($subjectId)
{
    $subject = Subject::find($subjectId);
    $results = $subject->results;

    $currentRank = 1;
    $results->each(function ($result, $index) {
        $nextRank = $currentRank + 1;
        $result->position = ($result->total_score === $results[$index-1]->total_score) ? $currentRank : $nextRank;
    
        if ($result->user_id === $user->id) {
            return $currentRank;
            break;
        }
    
        $currentRank = $nextRank;
    }); 
}





//Get all subjects
//Results table
//Do an inner join with the subjects the student took
//Get position by arranging all scores of that subject by score and get the index of the students own