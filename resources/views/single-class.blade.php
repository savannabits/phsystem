@extends("layouts.app")
@php
/**
 * @var \App\PhClass $class
 */
@endphp
@section("page-title","Manage Heritage Class: ". $class->name)
@section("content")
    <ph-class-component
        :data="{}"
        :ph-class="{{json_encode($class)}}"
        url="{{$class->resource_url}}"
        inline-template
        v-cloak
    >
        <div>
            <b-card class="card-flat">
                <b-card-title>Currently Enrolled Children</b-card-title>
                <b-row>
                    @foreach ($class->current_enrollments as $enrollment)
                        @php
                        /**@var \App\Enrollment $enrollment*/
                        @endphp
                        <b-col md="6">
                            <b-card class="card-flat" no-body>
                                <b-row>
                                    <b-col md="2">
                                        <b-img-lazy width="50" src="{{$enrollment->child->avatar_thumb}}"></b-img-lazy>
                                    </b-col>
                                    <b-col md="10" class="" style="min-height: 50px">
                                        <h4>{{$enrollment->child->first_name." ".$enrollment->child->middle_names." ".$enrollment->child->last_name}}</h4>
                                    </b-col>
                                </b-row>
                            </b-card>
                        </b-col>
                    @endforeach
                </b-row>
            </b-card>
            <b-card class="card-flat">
                <h4>Class Attendance</h4>
                <vue-cal
                    style="height: 500px"
                    :events="rollCalls"
                    :time="false"
                    :disable-views="['week']"
                    class="vuecal--blue-theme"
                    :today-button="true"
                    :cell-click-hold="false"
                    events-on-month-view="events-on-month-view"
                    active-view="month"
                >
                    <template v-slot:cell-content="{cell,view,events,goNarrower}">
                        <span class="vuecal__cell-date" :class="view.id" v-if="view.id === 'month'" @click="goNarrower">
                          @{{ cell.startDate.getDate() }}
                        </span>
                        <span class="vuecal__cell-date" :class="view.id" v-if="['year','years'].includes(view.id)" @click="goNarrower">
                          @{{ cell.content }}
                        </span>
                        <span class="vuecal__cell-content" v-if="['month', 'day'].includes(view.id) && events.length && events[0].is_marked">
                            <b-button class="p-2 m-2" @click="showRollCall(events[0])" variant="success"><i class="fa fa-calendar-check"></i> show</b-button>
                        </span>
                        <span class="vuecal__cell-content" v-if="['month', 'day'].includes(view.id) && events.length && !events[0].is_marked">
                            <b-button class="p-2 m-2" @click="showRollCall(events[0])" variant="warning"><i class="fa fa-calendar-plus"></i> mark now</b-button>
                        </span>

                        <span class="vuecal__no-event" v-if="['month', 'day'].includes(view.id) && !events.length">
                            <b-button size="sm" class="p-2" @click="createRollCall(cell.startDate)" variant="danger"><i class="fa fa-plus"></i> add</b-button>
                        👌</span>
                    </template>
                </vue-cal>
            </b-card>
            <b-modal ref="rollCallModal" v-if="currentRollCall" size="xl"
                     scrollable no-close-on-esc no-close-on-backdrop
                     ok-title="Done"
                     cancel-title="Close"
                     @hidden="fetchClassRollCalls()"
            >
                <template v-slot:modal-title>Roll Call for @{{ classForm.name }} on @{{ currentRollCall.start }}</template>
                <hr>
                <b-list-group>
                    <b-list-group-item
                        v-for="(attendance,key) in attendances" :key="key"
                        class="flex-column align-items-start p-0 my-0 border"
                    >
                        <div
                            class="d-flex p-0 m-0 pr-2 align-items-center justify-content-between"
                            :class="{
                            'alert-success': attendance.status && attendance.status.name==='Present',
                            'alert-warning': attendance.status && attendance.status.name==='Apology',
                            'alert-danger': attendance.status && attendance.status.name==='Absent',
                            }"
                        >
                            <b-img-lazy width="100" :src="attendance.enrollment.child.avatarThumb"></b-img-lazy>
                            <h4 class="ml-2">@{{ attendance.enrollment.child.full_name }}</h4>
                            <b-form-group label-cols="1" class="py-0 my-0">
                                <b-form-radio-group
                                    class="my-0"
                                    v-model="attendance.attendance_status_id"
                                    :options="attendanceStatuses"
                                    text-field="name"
                                    value-field="id"
                                    buttons
                                    button-variant="outline-info"
                                    size="md"
                                    :name="`status-${attendance.enrollment.id}`"
                                    v-on:input="markAttendance($event,attendance,key)"
                                ></b-form-radio-group>
                            </b-form-group>
                        </div>
                    </b-list-group-item>
                </b-list-group>
            </b-modal>
        </div>
    </ph-class-component>
@endsection
