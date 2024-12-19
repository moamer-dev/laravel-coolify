@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        @include('components.paths.path-header')
        <h2>Learning Path Visualization</h2>
        <div id="visualization" style="height: 600px;"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var pathCourses = "{{ $pathCourses }}";
                console.log("pathCourses", pathCourses);
                pathCourses.forEach(function(post) {
                    console.log(post);
                });
                //console.log("pathCourses", pathCourses);

                // const data = {
                //     nodes: [
                //         // Paths
                //         @foreach ($pathCourses as $course)
                //             {
                //                 id: "path{{ $course->path_id }}",
                //                 name: "{{ $course->path_name }}",
                //                 group: "path"
                //             },
                //         @endforeach
                //         @foreach ($pathQuizzes as $quiz)
                //             {
                //                 id: "quiz{{ $quiz->id }}",
                //                 name: "{{ $quiz->name }}",
                //                 group: "quiz"
                //             },
                //         @endforeach
                //         @foreach ($pathProjects as $project)
                //             {
                //                 id: "project{{ $project->id }}",
                //                 name: "{{ $project->name }}",
                //                 group: "project"
                //             },
                //         @endforeach
                //         @foreach ($pathSeries as $series)
                //             {
                //                 id: "series{{ $series->id }}",
                //                 name: "{{ $series->name }}",
                //                 group: "series"
                //             },
                //         @endforeach
                //     ],
                //     links: [
                //         // Path to Courses
                //         @foreach ($pathCourses as $course)
                //             {
                //                 source: "path{{ $course->path_id }}",
                //                 target: "course{{ $course->id }}"
                //             },
                //         @endforeach
                //         // Path to Quizzes
                //         @foreach ($pathQuizzes as $quiz)
                //             {
                //                 source: "path{{ $quiz->path_id }}",
                //                 target: "quiz{{ $quiz->id }}"
                //             },
                //         @endforeach
                //         // Path to Projects
                //         @foreach ($pathProjects as $project)
                //             {
                //                 source: "path{{ $project->path_id }}",
                //                 target: "project{{ $project->id }}"
                //             },
                //         @endforeach
                //         // Path to Series
                //         @foreach ($pathSeries as $series)
                //             {
                //                 source: "path{{ $series->path_id }}",
                //                 target: "series{{ $series->id }}"
                //             },
                //         @endforeach
                //     ]
                // };

                // const width = document.getElementById('visualization').offsetWidth;
                // const height = 600;

                // const svg = d3.select("#visualization")
                //     .append("svg")
                //     .attr("width", width)
                //     .attr("height", height);

                // const simulation = d3.forceSimulation(data.nodes)
                //     .force("link", d3.forceLink(data.links).id(d => d.id).distance(100))
                //     .force("charge", d3.forceManyBody().strength(-200))
                //     .force("center", d3.forceCenter(width / 2, height / 2));

                // const link = svg.append("g")
                //     .selectAll("line")
                //     .data(data.links)
                //     .enter().append("line")
                //     .attr("stroke", "#999")
                //     .attr("stroke-width", 2);

                // const node = svg.append("g")
                //     .selectAll("circle")
                //     .data(data.nodes)
                //     .enter().append("circle")
                //     .attr("r", 10)
                //     .attr("fill", d => {
                //         return d.group === "path" ? "blue" :
                //             d.group === "quiz" ? "orange" :
                //             d.group === "project" ? "green" : "red";
                //     })
                //     .call(d3.drag()
                //         .on("start", dragstarted)
                //         .on("drag", dragged)
                //         .on("end", dragended));

                // node.append("title")
                //     .text(d => d.name);

                // simulation.on("tick", () => {
                //     link.attr("x1", d => d.source.x)
                //         .attr("y1", d => d.source.y)
                //         .attr("x2", d => d.target.x)
                //         .attr("y2", d => d.target.y);

                //     node.attr("cx", d => d.x)
                //         .attr("cy", d => d.y);
                // });

                // function dragstarted(event, d) {
                //     if (!event.active) simulation.alphaTarget(0.3).restart();
                //     d.fx = d.x;
                //     d.fy = d.y;
                // }

                // function dragged(event, d) {
                //     d.fx = event.x;
                //     d.fy = event.y;
                // }

                // function dragended(event, d) {
                //     if (!event.active) simulation.alphaTarget(0);
                //     d.fx = null;
                //     d.fy = null;
                // }
            });
        </script>
    @endsection
