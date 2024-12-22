<div class="container">
    <style>
        .offcanvas-header {
            background-color: #f8f9fa;
        }

        .offcanvas-body {
            font-size: 14px;
        }

        #myDiagramDiv {
            width: 100%;
            height: 800px;
            border: 1px solid lightgray;
        }
    </style>
    <button class="btn btn-primary mt-3 mb-4 {{ !$activeTechnology ? 'd-none' : '' }}" wire:click="resetSelectTechnology">
        {{ $activeTechnology ? 'تعديل الخيارات' : '' }}
    </button>
    <div class="row">
        <!-- Learning Paths -->
        @if (!$activeTechnology || $showLearningCards)
            <div class="col-md-4">
                <div class="card" style="max-height: 550px; overflow-y: auto;">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">المسارات التي قمت بإختيارها</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">قم بالنقر على المسار لإظهار المسارات
                                الفرعية</span>
                        </h3>
                    </div>
                    <div class="card-body pt-5">
                        @foreach ($userPaths as $path)
                            <div class="d-flex flex-stack p-4 rounded {{ $activePath === $path->id ? 'bg-light-primary' : '' }}"
                                wire:click="selectPath({{ $path->id }})" style="cursor: pointer;">
                                <div class="d-flex align-items-center me-3">
                                    <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                        class="me-4 w-30px" alt="">
                                    <div class="flex-grow-1">
                                        <a href="javascript:void(0)"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $path->title }}</a>
                                        <span
                                            class="text-gray-500 fw-semibold d-block fs-6">{{ $path->description }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Learning Stacks -->
        @if ($activePath && (!$activeTechnology || $showLearningCards))
            <div class="col-md-4">
                <div class="card" style="max-height: 550px; overflow-y: auto;">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">المسارات الفرعية</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">قم تحديد المسار الفرعي الذي تود
                                تعلمه</span>
                        </h3>
                    </div>
                    <div class="card-body pt-5">
                        @foreach ($selectedPath->learningStacks as $stack)
                            <div class="d-flex flex-stack p-4 rounded {{ $activeStack === $stack->id ? 'bg-light-info' : '' }}"
                                wire:click="selectStack({{ $stack->id }})" style="cursor: pointer;">
                                <div class="d-flex align-items-center me-3">
                                    <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                        class="me-4 w-30px" alt="">
                                    <div class="flex-grow-1">
                                        <a href="javascript:void(0)"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $stack->title }}</a>
                                        <span
                                            class="text-gray-500 fw-semibold d-block fs-6">{{ $stack->description }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Technology Stacks -->
        @if ($activeStack)
            <div class="col-md-4">
                <div class="card" style="max-height: 550px; overflow-y: auto;">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">التكنولوجيات الخاصة بالمسار</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">هنا يمكنك إختيار التكنولوجيا التي تود
                                تعلمها</span>
                        </h3>
                    </div>
                    <div class="card-body pt-5">
                        @foreach ($selectedStack->technologyStacks as $tech)
                            <div class="d-flex flex-stack p-4 rounded {{ $activeTechnology === $tech->id ? 'bg-light-success' : '' }}"
                                wire:click="selectTechnology({{ $tech->id }})" style="cursor: pointer;">
                                <div class="d-flex align-items-center me-3">
                                    <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                        class="me-4 w-30px" alt="">
                                    <div class="flex-grow-1">
                                        <a href="javascript:void(0)"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $tech->name }}</a>
                                        <span
                                            class="text-gray-500 fw-semibold d-block fs-6">{{ $tech->description }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if ($activeTechnology)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">
                                المصادر الخاصة بـ {{ $selectedTechnology->name }} </span>
                            <span class="text-muted mt-1 fw-semibold fs-7">هنا تجد جميع المصادر الخاصة بـ
                                {{ $selectedTechnology->name }} والذي يمكنك البدء في تعلمها الآن</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-group mb-3" role="group" aria-label="Content Buttons">
                            <button class="btn btn-outline-primary {{ $contentType === 'courses' ? 'active' : '' }}"
                                wire:click="showContent('courses')">الدورات</button>
                            <button class="btn btn-outline-primary {{ $contentType === 'quizzes' ? 'active' : '' }}"
                                wire:click="showContent('quizzes')">الإختبارات</button>
                            <button class="btn btn-outline-primary {{ $contentType === 'series' ? 'active' : '' }}"
                                wire:click="showContent('series')">السلاسل التعليمية</button>
                            <button class="btn btn-outline-primary {{ $contentType === '' ? 'active' : '' }}"
                                wire:click="showContent('series')">المقالات</button>
                            <button class="btn btn-outline-primary {{ $contentType === '' ? 'active' : '' }}"
                                wire:click="showContent('series')">المصادر الخارجية</button>
                        </div>

                        <div class="row g-3">
                            @if ($contentType === 'courses')
                                @foreach ($selectedTechnology->courses as $course)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        @livewire('courses.course-card', ['item' => $course], key($course->slug . '-' . $course->id))
                                    </div>
                                @endforeach
                            @elseif ($contentType === 'quizzes')
                                @foreach ($selectedTechnology->quizzes as $quiz)
                                    <div class="col-md-4">
                                        @include('components.courses.quiz-card', ['item' => $quiz])
                                    </div>
                                @endforeach
                            @elseif ($contentType === 'series')
                                @foreach ($selectedTechnology->series as $seriesItem)
                                    <div class="col-12">
                                        @include('components.courses.series-card', ['item' => $seriesItem])
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div style="text-align: center; margin-bottom: 10px;">
        <button id="zoomIn" class="btn btn-primary">Zoom In</button>
        <button id="zoomOut" class="btn btn-primary">Zoom Out</button>
        <button id="resetZoom" class="btn btn-secondary">Reset Zoom</button>
    </div>
    <div id="myDiagramDiv" style="width: 100%; height: 600px; border: 1px solid black;"></div>

    <!-- Bootstrap Drawer -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="infoDrawer" aria-labelledby="infoDrawerLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="infoDrawerLabel">Node Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="drawerContent">
            <!-- Node details will be shown here -->
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="infoDrawer" aria-labelledby="infoDrawerLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="infoDrawerLabel">Node Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p id="drawerContent">No content available.</p>
        </div>
    </div>
</div>

<script>
    // Assuming userPaths is already defined from the server-side
    const userPaths = @json($userPaths);
    console.log("userPaths", userPaths);

    // Function to process userPaths into roadmap TreeModel data
    function processUserPaths(userPaths) {
        const nodes = [];
        let keyCounter = 1;

        userPaths.forEach((path) => {
            nodes.push({
                key: `path_${path.id}`,
                name: path.title,
                isMain: true,
                step: 1
            });

            let stepCounter = 1;

            path.learning_stacks.forEach((stack) => {
                nodes.push({
                    key: `stack_${stack.id}`,
                    parent: `path_${path.id}`,
                    name: stack.title,
                    isMain: true,
                    step: stepCounter++
                });

                let techCounter = 1;

                stack.technology_stacks
                    .sort((a, b) => a.id - b.id) // Ensure technologies are in logical order
                    .forEach((tech) => {
                        nodes.push({
                            key: `tech_${tech.id}`,
                            parent: `stack_${stack.id}`,
                            name: `${techCounter++}. ${tech.name}`,
                            isMain: false,
                            step: techCounter
                        });
                    });
            });
        });

        return nodes;
    }

    // Process the userPaths data
    const diagramData = processUserPaths(userPaths);

    function init() {
        const $ = go.GraphObject.make;

        // Initialize Diagram
        const myDiagram = $(go.Diagram, "myDiagramDiv", {
            layout: $(go.LayeredDigraphLayout, {
                direction: 90, // Top-to-bottom flow
                layerSpacing: 50, // Spacing between layers
                columnSpacing: 20 // Spacing between nodes in the same layer
            }),
            "undoManager.isEnabled": true,
            "clickCreatingTool.archetypeNodeData": {
                name: "New Note",
                isNote: true
            }
        });

        // Node Template
        myDiagram.nodeTemplate = $(
            go.Node,
            "Auto", {
                click: (e, obj) => showDrawer(obj.part.data) // Show drawer on node click
            },
            $(go.Shape, "RoundedRectangle", {
                    strokeWidth: 1
                },
                new go.Binding("fill", "", (data) => {
                    if (data.isMain === true) return "#FFD700"; // Gold for main nodes
                    if (data.isMain === false) return "lightblue"; // Light blue for steps
                    if (data.isNote) return "#FFEB3B"; // Yellow for notes
                    return "gray"; // Fallback color
                })
            ),
            $(
                go.TextBlock, {
                    margin: 8,
                    font: "bold 12pt sans-serif",
                    wrap: go.TextBlock.WrapFit
                },
                new go.Binding("text", "name")
            )
        );

        // Link Template
        myDiagram.linkTemplate = $(
            go.Link, {
                routing: go.Link.AvoidsNodes,
                curve: go.Link.JumpOver,
                corner: 5
            },
            $(go.Shape, {
                strokeWidth: 2,
                stroke: "#555"
            }),
            $(go.Shape, {
                toArrow: "Standard",
                stroke: null,
                fill: "#555"
            })
        );

        // Assign the diagram model
        myDiagram.model = new go.TreeModel(diagramData);


        // Zoom controls
        document.getElementById("zoomIn").addEventListener("click", () => {
            myDiagram.commandHandler.increaseZoom();
        });
        document.getElementById("zoomOut").addEventListener("click", () => {
            myDiagram.commandHandler.decreaseZoom();
        });
        document.getElementById("resetZoom").addEventListener("click", () => {
            myDiagram.scale = 1; // Reset zoom to default
            myDiagram.centerDiagram(); // Center the diagram
        });
    }

    function showDrawer(data) {
        document.getElementById("infoDrawerLabel").textContent = data.name;
        document.getElementById("drawerContent").textContent = `Details about ${data.name}`;
        const drawer = new bootstrap.Offcanvas(document.getElementById("infoDrawer"));
        drawer.show();
    }

    // Initialize Diagram
    document.addEventListener("DOMContentLoaded", init);
</script>
