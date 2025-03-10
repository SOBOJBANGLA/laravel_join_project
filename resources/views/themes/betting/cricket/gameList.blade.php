@extends($theme.'layouts.app')
@section('title',trans('Cricket Games'))

@section('content')
<div class="wrapper">
    <div class="content">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            @forelse($games as $game)
                <div class="col-md-4 mb-3">
                    <div class="card" data-match-id="{{ $game->match_id }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <strong>তারিখ:</strong> <span class="match-date">{{date('d M Y', strtotime($game->match_date))}}</span>
                                </div>
                                <div>
                                    <strong>সময়:</strong> <span class="match-time">{{date('h:i A', strtotime($game->match_time))}}</span>
                                </div>
                                <div>
                                    <span class="badge bg-{{strtolower($game->status) == 'in progress' ? 'success' : 'warning'}} match-status">
                                        {{$game->status}}
                                    </span>
                                </div>
                            </div>

                            {{-- <div class="mb-2">
                                <strong>ভেন্যু:</strong> {{$game->venue}}
                            </div>
                            <div class="mb-3">
                                <strong>ফরম্যাট:</strong> {{$game->match_format}}
                            </div> --}}

                            <h5 class="card-title">{{$game->title}}</h5>
                            <p class="card-text">
                                <strong>Competition:</strong> {{$game->competition}}<br>
                                <strong>Status:</strong> {{$game->status}}
                            </p>
                            
                            @php
                                $defaultTeams = [
                                    'team1' => ['name' => 'Team 1', 'shortName' => 'T1'],
                                    'team2' => ['name' => 'Team 2', 'shortName' => 'T2']
                                ];
                                
                                $defaultScores = [
                                    'team1' => ['runs' => 0, 'wickets' => 0, 'overs' => 0],
                                    'team2' => ['runs' => 0, 'wickets' => 0, 'overs' => 0]
                                ];
                                
                                $teams = json_decode($game->teams, true) ?: $defaultTeams;
                                $scores = json_decode($game->scores, true) ?: $defaultScores;
                            @endphp

                            <div class="teams">
                                <div class="team-score mb-2">
                                    <strong>{{ $teams['team1']['name'] ?? 'Team 1' }} ({{ $teams['team1']['shortName'] ?? 'T1' }})</strong><br>
                                    <span class="team1-score">
                                        @if(isset($scores['team1']['runs']) && ($scores['team1']['runs'] > 0 || ($scores['team1']['overs'] ?? 0) > 0))
                                            {{ $scores['team1']['runs'] ?? 0 }}/{{ $scores['team1']['wickets'] ?? 0 }}
                                            ({{ $scores['team1']['overs'] ?? 0 }} Over)
                                        @else
                                            Yet to bat
                                        @endif
                                    </span>
                                </div>

                                <div class="team-score mb-2">
                                    <strong>{{ $teams['team2']['name'] ?? 'Team 2' }} ({{ $teams['team2']['shortName'] ?? 'T2' }})</strong><br>
                                    <span class="team2-score">
                                        @if(isset($scores['team2']['runs']) && ($scores['team2']['runs'] > 0 || ($scores['team2']['overs'] ?? 0) > 0))
                                            {{ $scores['team2']['runs'] ?? 0 }}/{{ $scores['team2']['wickets'] ?? 0 }}
                                            ({{ $scores['team2']['overs'] ?? 0 }} Over)
                                        @else
                                            Yet to bat
                                        @endif
                                    </span>
                                </div>
                            </div>
                            
                            @if(Auth::check())
                                <div class="betting-form mt-3">
                                    @if(strtolower($game->status) == 'complete' || strtolower($game->status) == 'completed')
                                        <div class="alert alert-info text-center">
                                            <i class="fas fa-info-circle"></i> ম্যাচটি শেষ হয়ে গেছে। বেট করা যাবে নতুন স্কোর দেখাবে
                                        </div>
                                    @elseif(strtolower($game->status) == 'toss')
                                        <div class="alert alert-warning text-center">
                                            <i class="fas fa-clock"></i> টস হয়েছে। ম্যাচ শুরু হলে বেট করা যাবে।
                                        </div>
                                    @elseif(strtolower($game->status) == 'in progress' || strtolower($game->status) == 'live')
                                        <form action="{{ route('cricket.place.bet') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="match_id" value="{{ $game->match_id }}">
                                            
                                            <div class="form-group mb-3">
                                                <label>বেট এমাউন্ট</label>
                                                <input type="number" name="bet_amount" class="form-control" required min="1">
                                            </div>
                                            
                                            <div class="form-group mb-3">
                                                <label>বেট করুন</label>
                                                <select name="bet_on" class="form-control" required>
                                                    <option value="team1">{{ $teams['team1']['name'] ?? 'Team 1' }} (2x)</option>
                                                    <option value="team2">{{ $teams['team2']['name'] ?? 'Team 2' }} (2x)</option>
                                                </select>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary w-100">বেট প্লেস করুন</button>
                                        </form>
                                    @else
                                        <div class="alert alert-warning text-center">
                                            <i class="fas fa-clock"></i> ম্যাচ শুরু হলে বেট করা যাবে
                                        </div>
                                    @endif
                                </div>
                            @else
                                <a href="{{route('login')}}" class="btn btn-primary mt-2">লগইন করুন</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        কোন ক্রিকেট ম্যাচ এখন উপলব্ধ নেই।
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection 

{{-- @push('script')
<script>
    // স্কোর আপডেট ফাংশন
    function updateMatchScores() {
        fetch('/update-cricket-scores')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // পেজ রিফ্রেশ করে নতুন স্কোর দেখাবে
                } else {
                    console.log('স্কোর আপডেট করতে সমস্যা:', data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // প্রতি ২ মিনিট পর পর স্কোর আপডেট
    setInterval(updateMatchScores, 120000);

    // পেজ লোড হওয়ার সাথে সাথে প্রথম আপডেট
    document.addEventListener('DOMContentLoaded', updateMatchScores);
</script>
@endpush --}}