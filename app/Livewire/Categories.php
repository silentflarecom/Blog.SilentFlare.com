<?php

namespace App\Livewire;

use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        $categories = collect([
            ['name' => 'Development', 'count' => 12, 'description' => 'Coding, software architecture, and best practices.'],
            ['name' => 'Design', 'count' => 8, 'description' => 'UI/UX trends, color theory, and visual aesthetics.'],
            ['name' => 'Backend', 'count' => 15, 'description' => 'Server-side logic, databases, and APIs.'],
            ['name' => 'Frontend', 'count' => 10, 'description' => 'HTML, CSS, JavaScript, and modern frameworks.'],
            ['name' => 'DevOps', 'count' => 5, 'description' => 'CI/CD, deployment pipelines, and server management.'],
            ['name' => 'Career', 'count' => 3, 'description' => 'Advice for growing your career as a developer.'],
            ['name' => 'Tutorials', 'count' => 20, 'description' => 'Step-by-step guides for building real-world projects.'],
            ['name' => 'Resources', 'count' => 7, 'description' => 'Tools, libraries, and assets for developers.'],
        ]);

        return view('livewire.categories', [
            'categories' => $categories
        ]);
    }
}
