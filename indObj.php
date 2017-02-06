<?php

$newsObj = new News(); 
 $resTeam = $newsObj->getTNews();

 $res3 = $newsObj->getDiski();
 $res4 = $newsObj->getDiski01();
 $rumours = $newsObj->getRumours();
 $teamRes = $newsObj->GetResults();
 $AnoteamRes = $newsObj->GetResult();
 $log = $newsObj->GetLog();
 
 $secSupTop = $newsObj->SupporterTopNews();
 $res6 = $newsObj->getMoreRumr();
 $secSupp = $newsObj->secSupport();
 $setTeamNews = $newsObj->getTeamNews();
 $secaTeamNews = $newsObj->AnoTeamNews();
 $SptNews = $newsObj->getSupporterMN();
 
 $games = $newsObj->GetGames();
 $game = $newsObj->GetGame();
 
 $TeamNewsTop = $newsObj->getTNews();
 $carouselTeamNews = $newsObj->getTNews();
 
 $supporterTop = $newsObj->SupporterTopNews();
 $anotherTeamTopN = $newsObj->AnoTeamTopN();
 $rmourTop = $newsObj->carouselRumour();
 
 
 $carSupporterN = $newsObj->SupporterTopNews();
 
 $carRumour = $newsObj->carouselRumour();
 
 $anotSupTop = $newsObj->anoSupporterTop();
 
 $teamTopN2 = $newsObj->AnoTeamTopN();
?>