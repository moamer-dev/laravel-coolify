@php
    $user = Auth::user()->load('profile');
    $apiToken = $user->api_token;
@endphp
@extends('layouts.dashboard')
@section('content')
    <style>
        .main-node:hover rect {
            fill: #003d80;
            cursor: pointer;
        }

        rect:hover {
            fill: #0056b3;
            cursor: pointer;
        }
    </style>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        @include('components.paths.path-header')
        <h2>Learning Path Visualization</h2>
        <div id="visualization" style="width: 100%; height: 100vh; overflow: hidden; position: relative;"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                // async function fetchData() {
                //     const response = await fetch("/api/visualize/1", {
                //         headers: {
                //             'Accept': 'application/json',
                //         }
                //     });
                //     const data = await response.json();
                //     return data;
                // }

                // fetchData()

                fetch('/api/visualize/1', {
                        headers: {
                            'Accept': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    // .then(data => {
                    //     // Prepare the nodes and links
                    //     const nodes = [{
                    //             id: 'Courses',
                    //             group: 'main',
                    //             toggled: true
                    //         },
                    //         {
                    //             id: 'Quizzes',
                    //             group: 'main',
                    //             toggled: true
                    //         },
                    //         {
                    //             id: 'Projects',
                    //             group: 'main',
                    //             toggled: true
                    //         },
                    //         {
                    //             id: 'Series',
                    //             group: 'main',
                    //             toggled: true
                    //         }
                    //     ];

                    //     const links = [];

                    //     // Map the data to nodes and links
                    //     data.courses.forEach(course => nodes.push({
                    //         id: course.name,
                    //         group: 'course',
                    //         parent: 'Courses',
                    //         href: `/courses/${course.id}`,
                    //         hidden: false
                    //     }));
                    //     data.courses.forEach(course => links.push({
                    //         source: 'Courses',
                    //         target: course.name
                    //     }));

                    //     data.quizzes.forEach(quiz => nodes.push({
                    //         id: quiz.title,
                    //         group: 'quiz',
                    //         parent: 'Quizzes',
                    //         hidden: false
                    //     }));
                    //     data.quizzes.forEach(quiz => links.push({
                    //         source: 'Quizzes',
                    //         target: quiz.title
                    //     }));

                    //     data.projects.forEach(project => nodes.push({
                    //         id: project.name,
                    //         group: 'project',
                    //         parent: 'Projects',
                    //         hidden: false
                    //     }));
                    //     data.projects.forEach(project => links.push({
                    //         source: 'Projects',
                    //         target: project.name
                    //     }));

                    //     data.series.forEach(series => nodes.push({
                    //         id: series.name,
                    //         group: 'series',
                    //         parent: 'Series',
                    //         hidden: false
                    //     }));
                    //     data.series.forEach(series => links.push({
                    //         source: 'Series',
                    //         target: series.name
                    //     }));

                    //     // Create the SVG canvas
                    //     const width = document.getElementById('visualization').offsetWidth;
                    //     const height = 500;

                    //     // Add user instructions
                    //     const instructions = d3.select("#visualization")
                    //         .append("div")
                    //         .style("text-align", "center")
                    //         .style("margin-bottom", "10px")
                    //         .style("font-family", "Arial, sans-serif")
                    //         .style("font-size", "14px")
                    //         .text("Click on the circles to toggle related data. Drag nodes to reposition them.");

                    //     const svg = d3.select("#visualization")
                    //         .append("svg")
                    //         .attr("width", width)
                    //         .attr("height", height);

                    //     // Initialize the force simulation
                    //     const simulation = d3.forceSimulation(nodes)
                    //         .force("link", d3.forceLink(links).id(d => d.id).distance(150))
                    //         .force("charge", d3.forceManyBody().strength(-50))
                    //         .force("center", d3.forceCenter(width / 2, height / 2));

                    //     // Draw the links
                    //     const link = svg.append("g")
                    //         .selectAll("line")
                    //         .data(links)
                    //         .enter()
                    //         .append("line")
                    //         .attr("stroke", "#999")
                    //         .attr("stroke-width", 2);

                    //     // Draw the nodes
                    //     const node = svg.append("g")
                    //         .selectAll("g")
                    //         .data(nodes)
                    //         .enter()
                    //         .append("g")
                    //         .style("cursor", "pointer") // Add cursor pointer for hover
                    //         .call(d3.drag()
                    //             .on("start", dragstarted)
                    //             .on("drag", dragged)
                    //             .on("end", dragended))
                    //         .on("click", function(event, d) {
                    //             if (d.group === 'main') toggle(d.id); // Toggle the sub-nodes
                    //             else if (d.group !== 'main') {
                    //                 // Perform an action for sub-nodes, e.g., console log or navigation
                    //                 console.log(`Sub-node clicked: ${d.id}`);
                    //             }
                    //         });

                    //     // Add circles for main nodes
                    //     node.filter(d => d.group === 'main')
                    //         .append("circle")
                    //         .attr("r", 30)
                    //         .attr("fill", "#0056b3")
                    //         .attr("stroke", "#333")
                    //         .attr("stroke-width", 2);

                    //     // Add labels for main nodes
                    //     node.filter(d => d.group === 'main')
                    //         .append("text")
                    //         .attr("dy", 4)
                    //         .attr("text-anchor", "middle")
                    //         .attr("fill", "white")
                    //         .text(d => d.id);

                    //     // Add rectangles for sub-nodes
                    //     node.filter(d => d.group !== 'main')
                    //         .append("rect")
                    //         .attr("width", d => Math.min(200, d.id.length * 10 + 20)) // Adjust width based on text
                    //         .attr("height", 40)
                    //         .attr("x", d => -Math.min(200, d.id.length * 10 + 20) / 2) // Center the rectangle
                    //         .attr("y", -20)
                    //         .attr("fill", d => {
                    //             if (d.group === 'course') return "#007bff";
                    //             if (d.group === 'quiz') return "#28a745";
                    //             if (d.group === 'project') return "#ffc107";
                    //             if (d.group === 'series') return "#6c757d";
                    //         })
                    //         .attr("stroke", "#333")
                    //         .attr("stroke-width", 2);

                    //     // Add labels for sub-nodes
                    //     node.filter(d => d.group !== 'main')
                    //         .append("text")
                    //         .attr("dy", 4)
                    //         .attr("text-anchor", "middle")
                    //         .attr("fill", "white")
                    //         .text(d => d.id);

                    //     // Update simulation on tick
                    //     simulation.on("tick", () => {
                    //         link.attr("x1", d => d.source.x)
                    //             .attr("y1", d => d.source.y)
                    //             .attr("x2", d => d.target.x)
                    //             .attr("y2", d => d.target.y);

                    //         node.attr("transform", d => {
                    //             // Constrain nodes to stay within the canvas
                    //             d.x = Math.max(50, Math.min(width - 50, d.x));
                    //             d.y = Math.max(50, Math.min(height - 50, d.y));
                    //             return `translate(${d.x},${d.y})`;
                    //         });
                    //     });

                    //     // Toggle visibility of sub-nodes
                    //     function toggle(mainNodeId) {
                    //         const mainNode = nodes.find(node => node.id === mainNodeId);
                    //         if (!mainNode) return;

                    //         mainNode.toggled = !mainNode.toggled;

                    //         nodes.forEach(node => {
                    //             if (node.parent === mainNodeId) {
                    //                 node.hidden = !mainNode.toggled;
                    //             }
                    //         });

                    //         // Update links and nodes visibility
                    //         link.style("display", d => (nodes.find(node => node.id === d.target.id)?.hidden ?
                    //             "none" : "inline"));
                    //         node.selectAll("rect").style("display", d => (d.hidden ? "none" : "inline"));
                    //         node.selectAll("text").style("display", d => (d.hidden ? "none" : "inline"));

                    //         simulation.alpha(1).restart(); // Restart the simulation
                    //     }

                    //     // Drag event handlers
                    //     function dragstarted(event, d) {
                    //         if (!event.active) simulation.alphaTarget(0.05).restart();
                    //         d.fx = d.x;
                    //         d.fy = d.y;
                    //     }

                    //     function dragged(event, d) {
                    //         d.fx = Math.max(50, Math.min(width - 50, event.x)); // Restrict movement within canvas
                    //         d.fy = Math.max(50, Math.min(height - 50, event.y)); // Restrict movement within canvas
                    //     }

                    //     function dragended(event, d) {
                    //         d.fx = null; // Allow free positioning
                    //         d.fy = null;
                    //         if (!event.active) simulation.alphaTarget(0); // Resume simulation
                    //     }
                    // });

                    .then(data => {
                        // Prepare the nodes and links
                        const nodes = [{
                                id: 'Courses',
                                group: 'main',
                                toggled: true
                            },
                            {
                                id: 'Quizzes',
                                group: 'main',
                                toggled: true
                            },
                            {
                                id: 'Projects',
                                group: 'main',
                                toggled: true
                            },
                            {
                                id: 'Series',
                                group: 'main',
                                toggled: true
                            }
                        ];

                        const links = [];

                        // Map the data to nodes and links
                        data.courses.forEach(course => nodes.push({
                            id: course.name,
                            group: 'course',
                            parent: 'Courses',
                            href: `/course/${course.slug}`, // Dynamic hyperlink for courses
                            hidden: false
                        }));
                        data.courses.forEach(course => links.push({
                            source: 'Courses',
                            target: course.name
                        }));

                        data.quizzes.forEach(quiz => nodes.push({
                            id: quiz.title,
                            group: 'quiz',
                            parent: 'Quizzes',
                            href: `/quiz/${quiz.slug}`, // Dynamic hyperlink for quizzes
                            hidden: false
                        }));
                        data.quizzes.forEach(quiz => links.push({
                            source: 'Quizzes',
                            target: quiz.title
                        }));

                        data.projects.forEach(project => nodes.push({
                            id: project.name,
                            group: 'project',
                            parent: 'Projects',
                            href: `/projects/${project.id}`, // Dynamic hyperlink for projects
                            hidden: false
                        }));
                        data.projects.forEach(project => links.push({
                            source: 'Projects',
                            target: project.name
                        }));

                        data.series.forEach(series => nodes.push({
                            id: series.name,
                            group: 'series',
                            parent: 'Series',
                            href: `/series/${series.slug}/4`, // Dynamic hyperlink for series
                            hidden: false
                        }));
                        data.series.forEach(series => links.push({
                            source: 'Series',
                            target: series.name
                        }));

                        // Create the SVG canvas
                        const width = document.getElementById('visualization').offsetWidth;
                        const height = 500;

                        // Add user instructions
                        d3.select("#visualization")
                            .append("div")
                            .style("text-align", "center")
                            .style("margin-bottom", "10px")
                            .style("font-family", "Arial, sans-serif")
                            .style("font-size", "14px")
                            .text("Click on the circles to toggle related data. Drag nodes to reposition them.");

                        const svg = d3.select("#visualization")
                            .append("svg")
                            .attr("width", width)
                            .attr("height", height);

                        // Initialize the force simulation
                        const simulation = d3.forceSimulation(nodes)
                            .force("link", d3.forceLink(links).id(d => d.id).distance(150))
                            .force("charge", d3.forceManyBody().strength(-50))
                            .force("center", d3.forceCenter(width / 2, height / 2));

                        // Draw the links
                        const link = svg.append("g")
                            .selectAll("line")
                            .data(links)
                            .enter()
                            .append("line")
                            .attr("stroke", "#999")
                            .attr("stroke-width", 2);

                        // Draw the nodes
                        const node = svg.append("g")
                            .selectAll("g")
                            .data(nodes)
                            .enter()
                            .append("g")
                            .style("cursor", "pointer") // Add cursor pointer for hover
                            .call(d3.drag()
                                .on("start", dragstarted)
                                .on("drag", dragged)
                                .on("end", dragended))
                            .on("click", function(event, d) {
                                if (d.group === 'main') toggle(d.id); // Toggle the sub-nodes
                            });

                        // Add circles for main nodes
                        node.filter(d => d.group === 'main')
                            .append("circle")
                            .attr("r", 30)
                            .attr("fill", "#0056b3")
                            .attr("stroke", "#333")
                            .attr("stroke-width", 2);

                        // Add labels for main nodes
                        node.filter(d => d.group === 'main')
                            .append("text")
                            .attr("dy", 4)
                            .attr("text-anchor", "middle")
                            .attr("fill", "white")
                            .text(d => d.id);

                        // Add rectangles for sub-nodes with hyperlinks
                        node.filter(d => d.group !== 'main')
                            .append("a")
                            .attr("xlink:href", d => d.href) // Use dynamic hyperlink based on node type
                            .attr("target", "_blank") // Open in a new tab
                            .each(function(d) {
                                const group = d3.select(this);

                                // Add rectangle
                                group.append("rect")
                                    .attr("width", d => Math.min(200, d.id.length * 10 +
                                        20)) // Adjust width based on text
                                    .attr("height", 40)
                                    .attr("x", d => -Math.min(200, d.id.length * 10 + 20) /
                                        2) // Center the rectangle
                                    .attr("y", -20)
                                    .attr("fill", d => {
                                        if (d.group === 'course') return "#007bff";
                                        if (d.group === 'quiz') return "#28a745";
                                        if (d.group === 'project') return "#ffc107";
                                        if (d.group === 'series') return "#6c757d";
                                    })
                                    .attr("stroke", "#333")
                                    .attr("stroke-width", 2);

                                // Add label
                                group.append("text")
                                    .attr("dy", 4)
                                    .attr("text-anchor", "middle")
                                    .attr("fill", "white")
                                    .text(d => d.id);
                            });

                        // Update simulation on tick
                        simulation.on("tick", () => {
                            link.attr("x1", d => d.source.x)
                                .attr("y1", d => d.source.y)
                                .attr("x2", d => d.target.x)
                                .attr("y2", d => d.target.y);

                            node.attr("transform", d => {
                                // Constrain nodes to stay within the canvas
                                d.x = Math.max(50, Math.min(width - 50, d.x));
                                d.y = Math.max(50, Math.min(height - 50, d.y));
                                return `translate(${d.x},${d.y})`;
                            });
                        });

                        // Toggle visibility of sub-nodes
                        function toggle(mainNodeId) {
                            const mainNode = nodes.find(node => node.id === mainNodeId);
                            if (!mainNode) return;

                            mainNode.toggled = !mainNode.toggled;

                            nodes.forEach(node => {
                                if (node.parent === mainNodeId) {
                                    node.hidden = !mainNode.toggled;
                                }
                            });

                            // Update links and nodes visibility
                            link.style("display", d => (nodes.find(node => node.id === d.target.id)?.hidden ?
                                "none" : "inline"));
                            node.selectAll("rect").style("display", d => (d.hidden ? "none" : "inline"));
                            node.selectAll("text").style("display", d => (d.hidden ? "none" : "inline"));

                            simulation.alpha(1).restart(); // Restart the simulation
                        }

                        // Drag event handlers
                        function dragstarted(event, d) {
                            if (!event.active) simulation.alphaTarget(0.05).restart();
                            d.fx = d.x;
                            d.fy = d.y;
                        }

                        function dragged(event, d) {
                            d.fx = Math.max(50, Math.min(width - 50, event.x)); // Restrict movement within canvas
                            d.fy = Math.max(50, Math.min(height - 50, event.y)); // Restrict movement within canvas
                        }

                        function dragended(event, d) {
                            d.fx = null; // Allow free positioning
                            d.fy = null;
                            if (!event.active) simulation.alphaTarget(0); // Resume simulation
                        }
                    });



            });
        </script>
    @endsection
