<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if($employee == null || $employee->status !== 'active')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're not listed as an employee!!!") }}
                    </div>
                    <div class="p-6 text-gray-900">
                        {{ __("Please contact with admin") }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="#" class="block p-6 text-gray-900 text-center hover:underline">
                        {{ __("Create a leave request") }}
                    </a>
                </div>
            </div>
        </div>

        <div class="pb-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="w-full table-auto">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Casual Leave</th>
                                <th class="px-4 py-2">Sick Leave</th>
                                <th class="px-4 py-2">Emergency Leave</th>
                                <th class="px-4 py-2">Total Leave</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="px-4 py-2 text-center">{{ $employee->casual_leave }}</td>
                                <td class="px-4 py-2 text-center">{{ $employee->sick_leave }}</td>
                                <td class="px-4 py-2 text-center">{{ $employee->emergency_leave }}</td>
                                <td class="px-4 py-2 text-center">{{ $employee->total_leave }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div>
                            <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Leave Requests') }}
                            </h2>
                        </div>

                        <div class="bg-white p-4 rounded-lg">
                            <div class="overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200">
                                        <th class="px-4 py-2 text-center">#Sl No</th>
                                        <th class="px-4 py-2 text-start">Leave Type</th>
                                        <th class="px-4 py-2 text-start">From</th>
                                        <th class="px-4 py-2 text-start">To</th>
                                        <th class="px-4 py-2 text-start">Reason</th>
                                        <th class="px-4 py-2 text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($leaveRequests == null || $leaveRequests->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center">No Leave Request</td>
                                        </tr>
                                    @endif
                                    @foreach($leaveRequests as $leaveRequest)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-4 py-2 text-center">{{ ($leaveRequests->currentPage()-1) * $leaveRequests->perPage() + $loop->iteration }}</td>
                                            <td class="px-4 py-2">{{ $leaveRequest->type }}</td>
                                            <td class="px-4 py-2">{{ $leaveRequest->from }}</td>
                                            <td class="px-4 py-2">{{ $leaveRequest->to }}</td>
                                            <td class="px-4 py-2">{{ $leaveRequest->duration }}</td>
                                            <td class="px-4 py-2 text-center">
                                                <a href="" style="background-color:#68D391" class="text-white font-bold py-2 px-4 rounded">
                                                    {{ $leaveRequest->status }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $leaveRequests->onEachSide(1)->links() }}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

{{--        <div class="py-10">--}}
{{--            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                    <div class="p-6 text-gray-900">--}}
{{--                        {{ __("You're logged in!") }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    @endif

</x-app-layout>
