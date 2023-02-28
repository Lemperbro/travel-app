<div class="flex overflow-hidden ">

    <aside id="sidebar" class="fixed bg-slate-100 hidden z-20  h-screen overflow-y-auto top-0 left-0 pt-16 lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">

       <div class="relative flex-1 flex flex-col min-h-0 border-r pt-0">
          <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
             <div class="flex-1 px-3  divide-y space-y-1 ">
                <ul class="space-y-2 pb-2 ">
               

                  <li class="mt-0.5 w-full ">
                     <a href="/admin" class="p-3  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ ($tittle === 'Dashboard') ? 'bg-white shadow-best5' : '' }}  px-4 font-semibold text-slate-700 transition-colors " >
                     <div class="  {{ ($tittle === 'Dashboard')? 'bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }} {{ ($tittle !== 'Dashboard')? 'bg-white shadow-best' : '' }} mr-2 flex h-8 w-8 items-center justify-center rounded-lg  bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                 <g transform="translate(0.000000, 148.000000)">
                                 <path
                                    class="{{ ($tittle !== 'Dashboard')? 'fill-slate-800' : '' }} opacity-60"
                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                 ></path>
                                 <path
                                    class="{{ ($tittle !== 'Dashboard')? 'fill-slate-800' : '' }} "
                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"
                                 ></path>
                                 </g>
                              </g>
                           </g>
                           </g>
                        </svg>
                     </div>
                     <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                     </a>
                  </li>

                  <li  class="mt-0.5 w-full">
                     <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg {{ ($tittle === 'Kelola Kota') ? 'bg-white shadow-best5' : '' }}" href="/admin/kota">
                       <div class="{{ ($tittle === 'Kelola Kota')? 'bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }} {{ ($tittle !== 'Kelola Kota')? 'bg-white shadow-best' : '' }} mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                           <svg width="14px" height="14px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 128 128" enable-background="new 0 0 128 128" xml:space="preserve" fill="#000000">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                             <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                               <g transform="translate(1716.000000, 291.000000)">
                                 <g transform="translate(153.000000, 2.000000)">
                                     <path class="{{ ($tittle !== 'Kelola Kota')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Kota')? 'fill-white' : '' }} opacity-60" d="M20,48h8v-8h-8V48z M52,40h8v-8h-8V40z M68,40h8v-8h-8V40z M84,40h8v-8h-8V40z M52,24h8v-8h-8V24z M68,24 h8v-8h-8V24z M84,24h8v-8h-8V24z M52,72h8v-8h-8V72z M68,72h8v-8h-8V72z M84,72h8v-8h-8V72z M52,88h8v-8h-8V88z M84,88h8v-8h-8V88 z M52,104h8v-8h-8V104z M84,104h8v-8h-8V104z M108,96h8v-8h-8V96z M108,72v8h8v-8H108z M108,112h8v-8h-8V112z M52,56h8v-8h-8V56z M68,56h8v-8h-8V56z M84,56h8v-8h-8V56z M20,64h8v-8h-8V64z M20,80h8v-8h-8V80z M20,96h8v-8h-8V96z M20,112h8v-8h-8V112z M68,88h8 v-8h-8V88z"></path>
                                     <path class="{{ ($tittle !== 'Kelola Kota')? 'fill-slate-800' : '' }} {{ ($tittle === 'Kelola Kota')? 'fill-white' : '' }} " clip-rule="evenodd" fill="#000" d="M124,120c0,4.422-3.578,8-8,8H12c-4.422,0-8-3.578-8-8V32 c0-4.422,3.578-8,8-8h24V8c0-4.422,3.578-8,8-8h56c4.422,0,8,3.578,8,8v48h8c4.422,0,8,3.578,8,8V120z M36,32H12v88h24V32z M100,8 H44v112h24V96h8v24h24V8z M116,64h-8v56h8V64z"></path> 
                                 </g>
                               </g>
                             </g>
                           </g>
                         </svg>
                       </div>
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Manage City</span>
                     </a>
                   </li>



                   <li  class="mt-0.5 w-full">
                     <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg {{ ($tittle === 'Kelola Wisata') ? 'bg-white shadow-best5' : '' }}" href="/admin/wisata">
                       <div class="{{ ($tittle === 'Kelola Wisata')? 'bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }} {{ ($tittle !== 'Kelola Wisata')? 'bg-white shadow-best' : '' }} mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                           <!-- SVG Wisata -->
                           <svg width="14px" height="14px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#FFFFFF">
         
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                             <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                               <g transform="translate(1716.000000, 291.000000)">
                                 <g transform="translate(453.000000, 454.000000)">
                                   <!-- SVG Wisata -->
                                     <path class="{{ ($tittle !== 'Kelola Wisata')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Wisata')? 'fill-white' : '' }} opacity-60" d="M394.977,170.953c1.141-2.109,1.016-4.719-0.328-6.734l-37.047-55.563c-1.453-2.188-1.453-5.063,0-7.266 l37.047-55.563c1.344-2.016,1.469-4.609,0.328-6.734c-1.156-2.125-3.375-3.469-5.781-3.469H216.398v138.813h172.797 C391.602,174.438,393.82,173.078,394.977,170.953z"></path> 
                                     <path class="{{ ($tittle !== 'Kelola Wisata')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Wisata')? 'fill-white' : '' }}" d="M511.805,473.203l-8.703-19.141l-90.547-199.438H295.633h-9.344H213.68v31.547h54.031h46.5h20.688 L230.523,417.063L87.68,356.859l32.094-70.688h25.344v-31.547H99.43L0.195,473.203c-0.313,0.703-0.25,1.5,0.156,2.141 c0.422,0.641,1.125,1.031,1.891,1.031h507.516c0.766,0,1.469-0.391,1.891-1.031C512.055,474.703,512.117,473.906,511.805,473.203z M355.086,286.172h37.141l40.828,89.922L323.914,325.25L355.086,286.172z M47.758,444.813l33.406-73.578l174.563,73.578H47.758z M296.367,444.813l-50.734-21.391l68.156-85.469l129.281,60.203l21.172,46.656H296.367z"></path> 
                                 </g>
                               </g>
                             </g>
                           </g>
                         </svg>
                       </div>
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Manage Tours</span>
                     </a>
                   </li>

                   <li  class="mt-0.5 w-full">
                     <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors  {{ ($tittle === 'User') ? 'bg-white shadow-best5' : '' }} rounded-lg" href="/user">
                       <div class="{{ ($tittle === 'User')? 'bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }} {{ ($tittle !== 'User')? 'bg-white shadow-best' : '' }} mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                           <!-- SVG Booking -->
                           <svg height="12px" width="12px" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                             <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                               <g transform="translate(1716.000000, 291.000000)">
                                 <g transform="translate(453.000000, 454.000000)">
                                     <path class="{{ ($tittle !== 'User')? 'fill-slate-800' : '' }}  {{ ($tittle === 'User')? 'fill-white' : '' }} opacity-60" d="m13.817 5.669 4.504 4.501-8.15 8.15-4.501-4.504zm-3.006 13.944 8.8-8.8c.166-.163.27-.389.27-.64s-.103-.477-.269-.64l-5.156-5.156c-.166-.158-.392-.255-.64-.255s-.474.097-.64.256l-8.8 8.8c-.166.163-.27.389-.27.64s.103.477.269.64l5.156 5.156c.166.158.392.255.64.255s.474-.097.64-.256zm12.663-9.073-12.918 12.933c-.332.326-.787.527-1.289.527s-.957-.201-1.289-.527l-1.794-1.793c.477-.492.77-1.164.77-1.905 0-1.513-1.227-2.74-2.74-2.74-.74 0-1.412.294-1.905.771l.001-.001-1.781-1.794c-.326-.332-.527-.787-.527-1.289s.201-.957.527-1.289l12.919-12.906c.332-.326.787-.527 1.289-.527s.957.201 1.289.527l1.781 1.781c-.515.499-.835 1.197-.835 1.969 0 1.513 1.227 2.74 2.74 2.74.773 0 1.471-.32 1.969-.835l.001-.001 1.794 1.781c.326.332.527.787.527 1.289s-.201.957-.527 1.289z"></path>
                                 </g>
                               </g>
                             </g>
                           </g>
                         </svg>
                       </div>
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">User</span>
                     </a>
                   </li>

                   <li  class="mt-0.5 w-full">
                     <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="/admin/booking">
                       <div class="shadow-best mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                           <!-- SVG Booking -->
                           <svg height="12px" width="12px" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                             <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                               <g transform="translate(1716.000000, 291.000000)">
                                 <g transform="translate(453.000000, 454.000000)">
                                     <path class="fill-slate-800" d="m13.817 5.669 4.504 4.501-8.15 8.15-4.501-4.504zm-3.006 13.944 8.8-8.8c.166-.163.27-.389.27-.64s-.103-.477-.269-.64l-5.156-5.156c-.166-.158-.392-.255-.64-.255s-.474.097-.64.256l-8.8 8.8c-.166.163-.27.389-.27.64s.103.477.269.64l5.156 5.156c.166.158.392.255.64.255s.474-.097.64-.256zm12.663-9.073-12.918 12.933c-.332.326-.787.527-1.289.527s-.957-.201-1.289-.527l-1.794-1.793c.477-.492.77-1.164.77-1.905 0-1.513-1.227-2.74-2.74-2.74-.74 0-1.412.294-1.905.771l.001-.001-1.781-1.794c-.326-.332-.527-.787-.527-1.289s.201-.957.527-1.289l12.919-12.906c.332-.326.787-.527 1.289-.527s.957.201 1.289.527l1.781 1.781c-.515.499-.835 1.197-.835 1.969 0 1.513 1.227 2.74 2.74 2.74.773 0 1.471-.32 1.969-.835l.001-.001 1.794 1.781c.326.332.527.787.527 1.289s-.201.957-.527 1.289z"></path>
                                 </g>
                               </g>
                             </g>
                           </g>
                         </svg>
                       </div>
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Booking</span>
                     </a>
                   </li>




                   <li  class="mt-0.5 w-full">
                     <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ ($tittle === 'Kelola Supir') ? 'bg-white shadow-best5' : '' }} rounded-lg" href="/supir">
                       <div class="{{ ($tittle === 'Kelola Supir')? 'bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }} {{ ($tittle !== 'Kelola Supir')? 'bg-white shadow-best' : '' }} mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">

                         
                           <svg height="12px" width="12px" fill="#000000" height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 489.785 489.785" xml:space="preserve">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                             <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                               <g transform="translate(1716.000000, 291.000000)">
                                 <g transform="translate(153.000000, 2.000000)">
         
         
                                   <!-- SVG Driver -->
                                     <path class="{{ ($tittle !== 'Kelola Supir')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Supir')? 'fill-white' : '' }} opacity-60" id="XMLID_203_" d="M409.772,379.327l-81.359-124.975c-5.884-9.054-15.925-13.119-25.987-13.119 c-2.082,0-6.392,0.05-11.051,0.115c-0.363-0.61-0.742-1.215-1.355-1.627l-20.492-13.609c-2.364-1.569-5.434-1.486-7.701,0.182 l-16.948,12.508l-16.959-12.508c-2.285-1.668-5.337-1.751-7.72-0.182l-20.455,13.609c-0.578,0.377-0.945,0.907-1.282,1.461 c-4.828,0.031-9.327,0.057-11.222,0.057c-10.016,0-20.011,4.119-25.859,13.113L80.022,379.327 c-8.65,13.267-5.149,31.008,7.896,39.992l18.06,12.449c10.887-25.926,28.868-48.094,51.45-64.279l4.657-7.162v3.861 c16.364-10.811,34.941-18.477,54.885-22.234c-5.926-13.152-10.899-28.819-14.546-43.586c-4.249-17.232-6.741-33.201-6.741-42.245 c0-3.351,0.433-6.579,1.09-9.727l14.8,48.975c0.766,2.565,2.984,4.417,5.641,4.73c0.268,0.03,0.529,0.046,0.784,0.046 c2.365,0,4.602-1.25,5.818-3.34l11.538-19.873l3.246,3.235c-7.768,10.276-10.82,39.199-12.005,60.314 c5.994-0.734,12.066-1.222,18.254-1.222c6.201,0,12.292,0.497,18.304,1.23c-1.186-21.114-4.237-50.037-12.024-60.322l3.246-3.255 l11.574,19.892c1.216,2.09,3.422,3.34,5.805,3.34c0.255,0,0.522-0.016,0.779-0.046c2.655-0.314,4.874-2.166,5.659-4.73 l14.791-48.872c0.634,3.116,1.051,6.313,1.051,9.624c0,16.806-8.425,57.342-21.276,85.831 c19.981,3.768,38.588,11.453,54.953,22.291v-3.899l4.735,7.256c22.504,16.193,40.436,38.324,51.293,64.206l18.139-12.488 C414.919,410.335,418.403,392.594,409.772,379.327z M219.962,276.685l-8.613-28.53l12.388-8.24l12.322,9.088L219.962,276.685z M269.783,276.685l-16.079-27.683l12.31-9.088l12.401,8.24L269.783,276.685z"></path> 
                                     
                                     <path class="{{ ($tittle !== 'Kelola Supir')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Supir')? 'fill-white' : '' }}" id="XMLID_202_" d="M202.716,424.721l14.705,19.349c8.151-4.914,17.598-7.607,27.427-7.607c9.848,0,19.313,2.692,27.464,7.615 l14.705-19.363c-11.465-10.799-26.346-16.721-42.15-16.721C229.055,407.994,214.156,413.925,202.716,424.721z"></path> 
                                     <path class="{{ ($tittle !== 'Kelola Supir')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Supir')? 'fill-white' : '' }}" id="XMLID_201_" d="M176.693,160.576c0.499,25.456,14.96,47.266,36.03,58.591c9.622,5.18,20.473,8.384,32.174,8.384 c11.683,0,22.503-3.198,32.114-8.368c21.063-11.311,35.579-33.117,36.06-58.582c-17.379,12.075-41.896,19.923-68.174,19.923 S194.096,172.676,176.693,160.576z"></path> 
                                     <path class="{{ ($tittle !== 'Kelola Supir')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Supir')? 'fill-white' : '' }}" id="XMLID_200_" d="M174.741,100.132l-0.225,20.205c0.037,15.991,31.524,36.82,70.38,36.82 c38.855,0,70.314-20.829,70.331-36.82l-0.207-20.195c10.224-2.662,18.158-6.617,23.239-12.301 c3.981-4.434,6.267-9.902,6.267-16.783C344.528,39.883,299.879,0,244.897,0c-55.031,0-99.631,39.883-99.631,71.058 c0,6.881,2.273,12.34,6.236,16.783C156.585,93.524,164.529,97.479,174.741,100.132z"></path> 
                                     <path class="{{ ($tittle !== 'Kelola Supir')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Supir')? 'fill-white' : '' }}" id="XMLID_197_" d="M244.848,356.925c-73.255,0-132.858,59.605-132.858,132.86h33.47c0-0.048,0-0.114,0-0.161v-0.031 c1.088-6.557,6.711-11.334,13.313-11.334c0.115,0,0.243,0.01,0.37,0.01l51.707,1.341c-0.973,3.247-1.648,6.619-1.648,10.176h71.322 c0-3.557-0.669-6.929-1.66-10.176l51.724-1.341c0.109,0,0.219-0.01,0.353-0.01c6.595,0,12.243,4.777,13.324,11.334v0.031 c0,0.047,0,0.113,0,0.161h33.44C377.706,416.53,318.122,356.925,244.848,356.925z M302.201,433.91l-27.562,36.317 c-6.389-9.687-17.325-16.104-29.792-16.104c-12.437,0-23.385,6.411-29.762,16.098l-27.555-36.3 c-4.699-6.194-4.11-14.923,1.392-20.424c15.452-15.443,35.689-23.166,55.943-23.166c20.249,0,40.484,7.723,55.961,23.179 C306.322,419.007,306.901,427.719,302.201,433.91z"></path> 
                                 </g>
                               </g>
                             </g>
                           </g>
                         </svg>
                       </div>
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Driver</span>
                     </a>
                   </li>


                   <li  class="mt-0.5 w-full">
                     <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ ($tittle === 'Kelola Kendaraan') ? 'bg-white shadow-best5' : '' }} rounded-lg" href="/Kelola kendaraan">
                       <div class="{{ ($tittle === 'Kelola Kendaraan')? 'bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }} {{ ($tittle !== 'Kelola Kendaraan')? 'bg-white shadow-best' : '' }} mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                           <!-- SVG Kelola Kendaraan -->
                           <svg height="12px" width="12px" fill="#000000" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                             <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                               <g transform="translate(1716.000000, 291.000000)">
                                 <g transform="translate(153.000000, 2.000000)">
                                   <!-- SVG Kelola Kendaraan -->
                                     <path class="{{ ($tittle !== 'Kelola Kendaraan')? 'fill-slate-800' : '' }}  {{ ($tittle === 'Kelola Kendaraan')? 'fill-white' : '' }} opacity-60" d="M19.938 7.188l3.563 7.156c0.063 0.094 0.094 0.219 0.125 0.313 0.219 0.563 0.375 1.344 0.375 1.844v3.406c0 1.063-0.719 1.938-1.719 2.188v2c0 0.969-0.781 1.719-1.719 1.719-0.969 0-1.719-0.75-1.719-1.719v-1.938h-13.688v1.938c0 0.969-0.75 1.719-1.719 1.719-0.938 0-1.719-0.75-1.719-1.719v-2c-1-0.25-1.719-1.125-1.719-2.188v-3.406c0-0.5 0.156-1.281 0.375-1.844 0.031-0.094 0.063-0.219 0.125-0.313l3.563-7.156c0.281-0.531 1.031-1.031 1.656-1.031h12.563c0.625 0 1.375 0.5 1.656 1.031zM5.531 9.344l-1.906 4.344c-0.094 0.156-0.094 0.344-0.094 0.469h16.938c0-0.125 0-0.313-0.094-0.469l-1.906-4.344c-0.25-0.563-1-1.063-1.594-1.063h-9.75c-0.594 0-1.344 0.5-1.594 1.063zM4.688 19.906c1 0 1.781-0.813 1.781-1.844 0-1-0.781-1.781-1.781-1.781s-1.844 0.781-1.844 1.781c0 1.031 0.844 1.844 1.844 1.844zM19.313 19.906c1 0 1.844-0.813 1.844-1.844 0-1-0.844-1.781-1.844-1.781s-1.781 0.781-1.781 1.781c0 1.031 0.781 1.844 1.781 1.844z"></path> 
                                 </g>
                               </g>
                             </g>
                           </g>
                         </svg>
                       </div>
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">vehicle</span>
                     </a>
                   </li>

                  
          <li  class="mt-0.5 w-full">
            <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="/guide">
              <div class="shadow-best mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
               
                  <!-- SVG Guide -->
                  <svg height="12px" width="12px" viewBox="0 -2 24 24" id="meteor-icon-kit__regular-guide" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(153.000000, 2.000000)">
                          <!-- SVG Guide -->
                            <path class="fill-slate-800" fill-rule="evenodd" clip-rule="evenodd" d="M17 0C16.4477 0 16 0.44772 16 1V19C16 19.5523 16.4477 20 17 20C17.5523 20 18 19.5523 18 19V8.7808L23.2425 7.47014C23.6877 7.35885 24 6.95887 24 6.5V1C24 0.44772 23.5523 0 23 0H17zM22 5.71922L18 6.71922V2H22V5.71922z" fill="#FFFFFF"></path>
                            <path class="fill-slate-800" fill-rule="evenodd" clip-rule="evenodd" d="M7 11C9.20914 11 11 9.2091 11 7C11 4.79086 9.20914 3 7 3C4.79086 3 3 4.79086 3 7C3 9.2091 4.79086 11 7 11zM7 9C8.10457 9 9 8.1046 9 7C9 5.89543 8.10457 5 7 5C5.89543 5 5 5.89543 5 7C5 8.1046 5.89543 9 7 9z" fill="#FFFFFF"></path>
                            <path class="fill-slate-800" d="M5 14C3.34315 14 2 15.3431 2 17V19C2 19.5523 1.55228 20 1 20C0.447715 20 0 19.5523 0 19V17C0 14.2386 2.23858 12 5 12H9C11.7614 12 14 14.2386 14 17V19C14 19.5523 13.5523 20 13 20C12.4477 20 12 19.5523 12 19V17C12 15.3431 10.6569 14 9 14H5z" fill="#FFFFFF"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Guide</span>
            </a>
          </li>
                   
          <li  class="mt-0.5 w-full">
            <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="/laporan">
              <div class="shadow-best mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                  <!-- SVG Report -->
                  <svg width="12px" height="12px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#FFFFFF">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(153.000000, 2.000000)">
                          <!-- SVG Laporan -->
                         <path class="fill-slate-800" d="M341.333333,1.42108547e-14 L426.666667,85.3333333 L426.666667,341.333333 L3.55271368e-14,341.333333 L3.55271368e-14,1.42108547e-14 L341.333333,1.42108547e-14 Z M330.666667,42.6666667 L42.6666667,42.6666667 L42.6666667,298.666667 L384,298.666667 L384,96 L330.666667,42.6666667 Z M149.333333,234.666667 L149.333333,266.666667 L85.3333333,266.666667 L85.3333333,234.666667 L149.333333,234.666667 Z M341.333333,234.666667 L341.333333,266.666667 L192,266.666667 L192,234.666667 L341.333333,234.666667 Z M149.333333,170.666667 L149.333333,202.666667 L85.3333333,202.666667 L85.3333333,170.666667 L149.333333,170.666667 Z M341.333333,170.666667 L341.333333,202.666667 L192,202.666667 L192,170.666667 L341.333333,170.666667 Z M149.333333,106.666667 L149.333333,138.666667 L85.3333333,138.666667 L85.3333333,106.666667 L149.333333,106.666667 Z M341.333333,106.666667 L341.333333,138.666667 L192,138.666667 L192,106.666667 L341.333333,106.666667 Z" id="Combined-Shape"> </path> 
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan</span>
            </a>
          </li>

               <li  class="mt-0.5 w-full">
                  <a class="p-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="/" dashboardclient.html">
                  <div class="shadow-best mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <!-- SVG Dashboard Client -->
                        <svg height="12px" width="12px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                           <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(153.000000, 2.000000)">
                              <!-- SVG Dashboard Client -->
                                 <path class="fill-slate-800" d="M12 12C12 11.4477 12.4477 11 13 11H19C19.5523 11 20 11.4477 20 12V19C20 19.5523 19.5523 20 19 20H13C12.4477 20 12 19.5523 12 19V12Z" stroke="#000000" stroke-width="2" stroke-linecap="round"></path> 
                                 <path class="fill-slate-800" d="M4 5C4 4.44772 4.44772 4 5 4H8C8.55228 4 9 4.44772 9 5V19C9 19.5523 8.55228 20 8 20H5C4.44772 20 4 19.5523 4 19V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round"></path> 
                                 <path class="fill-slate-800" d="M12 5C12 4.44772 12.4477 4 13 4H19C19.5523 4 20 4.44772 20 5V7C20 7.55228 19.5523 8 19 8H13C12.4477 8 12 7.55228 12 7V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                              </g>
                           </g>
                        </g>
                        </g>
                     </svg>
                  </div>
                  <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard Client</span>
                  </a>
               </li>
                  <li class="flex gap-x-4 w-full p-3 mx-4">
                        <img src="{{ asset('ft_user/'.auth()->user()->image) }}" alt="" class="w-10 h-10 object-cover rounded-full">
                        <h1 class="font-semibold text-lg my-auto">{{ auth()->user()->username }}</h1>

                  </li>
                  <li>
                     <form action="/logout" method="post">
                        @csrf


                     <div class="mx-4">
                        <!-- pro btn  -->
                        <button type="submit" class="inline-block w-full px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" target="_blank" href="../pages/sign-in.html">Logout</button>
                      </div>
                  </form>

                  </li>

                </ul>
             </div>
          </div>
       </div>


    </aside>


     
    



   
