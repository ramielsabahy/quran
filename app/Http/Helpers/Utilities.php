<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Helpers;

class Utilities {
    public static function getTeamPendingMembers($team_id) {
        $members = \App\Team::find($team_id)->invitations()->get();
        $pending_members = collect([]);
        foreach($members as $member) {
            $member->load('player');
            $pending_members->push($member->player);
        }
        return $pending_members;
    }

    public static function getTeamConfirmedMembers($team_id) {
        $members = \App\Team::find($team_id)->members()->get();
        $confirmed_members = collect([]);
        foreach($members as $member) {
            $member->load('player');
            $confirmed_members->push($member->player);
        }
        return $confirmed_members;
    }

    public static function getLastFourMatches($team_id) {
        $matches = \App\Models\CompetitionSeasonMatch::where('VisitorTeamId', '=', $team_id)->orWhere('HomeTeamId', '=', $team_id)->limit(4)->get();
        foreach($matches as $match) {
            $match->HomeTeam = \App\Team::find($match->HomeTeamId);
            $match->VisitorTeam = \App\Team::find($match->VisitorTeamId);
        }
        return $matches;
    }

    public static function getEvents($team_id) {
        $events = collect([]);
        $competitionSeasons = \App\Models\CompetitionSeasonTeam::where('TeamId', '=', $team_id)->get();
        foreach($competitionSeasons as $competitionSeason) {
            $competitionSeason->load('CompetitionSeason');
            $competitionSeason->CompetitionSeason->load('Competition');
            $competition = [
                'Name' => $competitionSeason->CompetitionSeason->Competition->Name,
                'ArName' => $competitionSeason->CompetitionSeason->Competition->ArName,
                'season' => $competitionSeason->CompetitionSeason->Season,
                'competition_id' => $competitionSeason->CompetitionSeason->Competition->Id,
                'season_id' => $competitionSeason->CompetitionSeason->Id
            ];
            $events->push($competition);
        }
        return $events;
    }

    public static function processEvent($event_orm)
    {
        $event_orm->load('Competition');
        $event_orm->load('Table');
        $event_orm->load('Matches');
        $event_orm->load('Teams');
        $ended = json_decode("{\"Competition\":{}, \"Table\":[], \"Fixtures\":[], \"TopPlayers\":[] }");
        foreach($event_orm as $event)
        {
            $temp = $event->Matches[0]->where('CompetitionRoundId', '=', 1)->get();
            $event->Fixtures = json_decode("{}");
            $event->Fixtures->round32 = $temp;

            $ended->Fixtures = $event->Fixtures;
            $ended->Competition = $event->Competition;
            $ended->Table = $event->Table;
            $ended->TopPlayers = array();
            $col = new \Illuminate\Database\Eloquent\Collection();

            foreach ($event->Teams as $team)
            {
                foreach($team->team->members as $member)
                {
                    $neededplayer = $member->player;
                    //$neededplayer->actions = $member->actions;
                    $neededplayer->rank = $member->actions->sum('RefreeScoreValue');
                    //array_push($ended->Players, $neededplayer); 
                    $col->add($neededplayer);
                }
                //$ended->Players->put($team);
            }
            
            $col = $col->sortByDesc('rank');
            foreach ($col as $element)
            {
                array_push($ended->TopPlayers, $element); 
            }
            //$ended->Players = $col;

        }
        return $ended;
    }
}