<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2014 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class ModWowRaidProgressWodHelper extends WoWModuleAbstract
{
    /**
     * @var array
     */
    private $raids = array(
        7545 => array(
            'link'  => 'zone/hellfire-citadel/',
            'stats' => array('kills' => 0, 'mode' => 'normal'),
            'npcs'  => array(
                // Hellfire Assault
                95068 => array(
                    'link'   => 'zone/hellfire-citadel/hellfire-assault',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10027
                ),
                // Iron Reaver
                90284 => array(
                    'link'   => 'zone/hellfire-citadel/iron-reaver',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10032
                ),
                // Kormrok
                90766 => array(
                    'link'   => 'zone/hellfire-citadel/kormrok',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10033
                ),
                // Kilrogg Deadeye
                90378 => array(
                    'link'   => 'zone/hellfire-citadel/kilrogg-deadeye',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10035
                ),
                // Hellfire High Council
                92146 => array(
                    'link'   => 'zone/hellfire-citadel/hellfire-high-council',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10034
                ),
                // Gorefiend
                91809 => array(
                    'link'   => 'zone/hellfire-citadel/gorefiend',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10253
                ),
                // Shadow-Lord Iskar
                95067 => array(
                    'link'   => 'zone/hellfire-citadel/shadowlord-iskar',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10037
                ),
                // Socrethar the Eternal
                90296 => array(
                    'link'   => 'zone/hellfire-citadel/socrethar-the-eternal',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10040
                ),
                // Tyrant Velhari
                93439 => array(
                    'link'   => 'zone/hellfire-citadel/tyrant-velhari',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10041
                ),
                // Fel Lord Zakuun
                89890 => array(
                    'link'   => 'zone/hellfire-citadel/fel-lord-zakuun',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10038
                ),
                // Xhul'horac
                93068 => array(
                    'link'   => 'zone/hellfire-citadel/xhulhorac',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10039
                ),
                // Mannoroth
                91349 => array(
                    'link'   => 'zone/hellfire-citadel/mannoroth',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10042
                ),
                // Archimonde
                91331 => array(
                    'link'   => 'zone/hellfire-citadel/archimonde',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 10043
                ),
            ),
        ),

        // Blackrock Foundry
        6967 => array(
            'link' => 'zone/blackrock-foundry/',
            'stats' => array('kills' => 0, 'mode' => 'normal'),
            'npcs' => array(
                // Gruul
                76877 => array(
                    'link' => 'zone/blackrock-foundry/gruul',
                    'normal' => 25720,
                    'heroic' => 0,
                    'mythic' => 8966
                ),
                // Oregorger
                77182 => array(
                    'link' => 'zone/blackrock-foundry/oregorger',
                    'normal' => 25721,
                    'heroic' => 0,
                    'mythic' => 8967
                ),
                // Hans'gar and Franzok
                76974 => array(
                    'link' => 'zone/blackrock-foundry/Hansgar-and-franzok',
                    'normal' => 25722,
                    'heroic' => 0,
                    'mythic' => 8968
                ),
                // Flamebender Ka'graz
                76814 => array(
                    'link' => 'zone/blackrock-foundry/flamebender-kagraz',
                    'normal' => 25723,
                    'heroic' => 0,
                    'mythic' => 8932
                ),
                // Beastlord Darmac
                76865 => array(
                    'link' => 'zone/blackrock-foundry/beastlord-darmac',
                    'normal' => 25724,
                    'heroic' => 0,
                    'mythic' => 8956
                ),
                // Operator Thogar
                76906 => array(
                    'link' => 'zone/blackrock-foundry/operator-thogar',
                    'normal' => 25725,
                    'heroic' => 0,
                    'mythic' => 8969
                ),
                // The Blast Furnace
                76809 => array(
                    'link' => 'zone/blackrock-foundry/blast-furnace',
                    'normal' => 25726,
                    'heroic' => 0,
                    'mythic' => 8970
                ),
                // Kromog
                77692 => array(
                    'link' => 'zone/blackrock-foundry/kromog',
                    'normal' => 25727,
                    'heroic' => 0,
                    'mythic' => 8971
                ),
                // The Iron Maidens
                77577 => array(
                    'link' => 'zone/blackrock-foundry/the-iron-maidens',
                    'normal' => 25728,
                    'heroic' => 0,
                    'mythic' => 8972
                ),
                // Warlord Blackhand
                87420 => array(
                    'link' => 'zone/blackrock-foundry/warlord-blackhand',
                    'normal' => 25729,
                    'heroic' => 0,
                    'mythic' => 8973
                )
            ),
        ),

        // Highmaul
        6996 => array(
            'link' => 'zone/highmaul/',
            'stats' => array('kills' => 0, 'mode' => 'normal'),
            'npcs' => array(
                // Kargath Bladefist
                87444 => array(
                    'link' => 'zone/highmaul/kargath-bladefist',
                    'normal' => 25713,
                    'heroic' => 0,
                    'mythic' => 8949
                ),
                // The Butcher
                87447 => array(
                    'link' => 'zone/highmaul/the-butcher',
                    'normal' => 25714,
                    'heroic' => 0,
                    'mythic' => 8960
                ),
                // Tectus
                87446 => array(
                    'link' => 'zone/highmaul/tectus',
                    'normal' => 25715,
                    'heroic' => 0,
                    'mythic' => 8961
                ),
                // Brackenspore
                87441 => array(
                    'link' => 'zone/highmaul/brackenspore',
                    'normal' => 25716,
                    'heroic' => 0,
                    'mythic' => 8962
                ),
                // Twin Ogron
                87449 => array(
                    'link' => 'zone/highmaul/twin-ogron',
                    'normal' => 25717,
                    'heroic' => 0,
                    'mythic' => 8963
                ),
                // Ko'ragh
                87445 => array(
                    'link' => 'zone/highmaul/koragh',
                    'normal' => 25718,
                    'heroic' => 0,
                    'mythic' => 8964
                ),
                // Imperator Mar'gok
                87818 => array(
                    'link' => 'zone/highmaul/imperator-margok',
                    'normal' => 25719,
                    'heroic' => 0,
                    'mythic' => 8965
                ),
            ),
        )
    );

    /**
     * @return array
     */
    protected function getInternalData()
    {
        if ($this->params->module->get('mode') == 'auto')
        {
            try
            {
                $result = WoW::getInstance()->getAdapter('WoWAPI')->getData('members');
            } catch (Exception $e)
            {
                return $e->getMessage();
            }

            if (isset($result->body->achievements) && is_object($result->body->achievements))
            {
                $this->checkNormal($result->body->achievements);
            }

            if ((in_array('mythic', (array)$this->params->module->get('difficulty')) || in_array('mythic', (array)$this->params->module->get('difficulty'))) && $this->params->module->get('ranks'))
            {
                $this->checkHeroicAndMythic($result->body->members);
            }
        }

        if ($hidden = $this->params->module->get('hide'))
        {
            foreach ($hidden as $hide)
            {
                unset($this->raids[$hide]);
            }
        }

        $this->adjustments();

        // at last replace links and count mode-kills
        foreach ($this->raids as $zoneId => &$zone)
        {
            $zone['link'] = $this->link($zone['link'], $zoneId);
            $mythic = $heroic = $normal = 0;
            foreach ($zone['npcs'] as $npcId => &$npc)
            {
                $npc['link'] = $this->link($npc['link'], $npcId, true);
                if ($npc['mythic'] === true)
                {
                    $mythic++;
                }
                if ($npc['heroic'] === true)
                {
                    $heroic++;
                }
                if ($npc['normal'] === true)
                {
                    $normal++;
                }
            }

            if ($normal > 0)
            {
                $zone['stats']['kills'] = $normal;
            }

            if ($heroic > 0)
            {
                $zone['stats']['kills'] = $heroic;
                $zone['stats']['mode'] = 'heroic';
            }

            if ($mythic > 0)
            {
                $zone['stats']['kills'] = $mythic;
                $zone['stats']['mode'] = 'mythic';
            }

            $zone['collapsed'] = in_array($zoneId, (array)$this->params->module->get('collapsed'));

            $zone['stats']['bosses'] = count($zone['npcs']);
            $zone['stats']['percent'] = round(($zone['stats']['kills'] / $zone['stats']['bosses']) * 100);
        }

        return $this->raids;
    }

    private function checkNormal(stdClass $achievements)
    {
        foreach ($this->raids as &$zone)
        {
            foreach ($zone['npcs'] as &$npc)
            {
                $npc['normal'] = in_array($npc['normal'], $achievements->criteria);
            }
        }
    }

    private function checkHeroicAndMythic(array &$members)
    {
        $heroicIds = $this->getHeroicIDs();
        $mythicIds = $this->getMythicIDs();
        foreach ($members as &$member)
        {
            if (in_array($member->rank, $this->params->module->get('ranks')))
            {
                $member->achievements = $this->loadMember($member->character->name, $member->character->realm);
                if (!empty($member->achievements))
                {
                    foreach ($heroicIds as $id => $zoneNpc)
                    {
                        list ($npc, $zone) = explode(':', $zoneNpc, 2);
                        if (in_array($id, $member->achievements->achievementsCompleted))
                        {
                            $this->raids[$zone]['npcs'][$npc]['heroic']++;
                        }
                    }
                    foreach ($mythicIds as $id => $zoneNpc)
                    {
                        list ($npc, $zone) = explode(':', $zoneNpc, 2);
                        if (in_array($id, $member->achievements->achievementsCompleted))
                        {
                            $this->raids[$zone]['npcs'][$npc]['mythic']++;
                        }
                    }
                }
            }
        }

        foreach ($this->raids as &$zone)
        {
            foreach ($zone['npcs'] as &$npc)
            {
                $npc['heroic'] = (bool)($npc['heroic'] >= $this->params->module->get('successful', 5));
                $npc['mythic'] = (bool)($npc['mythic'] >= $this->params->module->get('successful', 5));
            }
        }
    }

    private function getHeroicIDs()
    {
        $result = array();
        foreach ($this->raids as $zoneId => &$zone)
        {
            foreach ($zone['npcs'] as $npc => &$modes)
            {
                $result[$modes['heroic']] = $npc . ':' . $zoneId;
                $modes['heroic'] = 0;
            }
        }

        return $result;
    }

    private function getMythicIDs()
    {
        $result = array();
        foreach ($this->raids as $zoneId => &$zone)
        {
            foreach ($zone['npcs'] as $npc => &$modes)
            {
                $result[$modes['mythic']] = $npc . ':' . $zoneId;
                $modes['mythic'] = 0;
            }
        }

        return $result;
    }

    /**
     * @param $member
     * @param $realm
     *
     * @return bool|string
     */
    private function loadMember($member, $realm)
    {
        try
        {
            $result = WoW::getInstance()->getAdapter('WoWAPI')->getMember($member, $realm);
        } catch (Exception $e)
        {
            return $e->getMessage();
        }

        if (!is_object($result->body) || !isset($result->body->achievements))
        {
            return false;
        }

        return $result->body->achievements;
    }

    private function adjustments()
    {
        foreach ($this->raids as $zoneId => &$zone)
        {
            foreach ($zone['npcs'] as $npcId => &$npc)
            {
                if ($npc['mythic'] === true || $npc['heroic'] === true || $npc['normal'] === true)
                {
                    continue;
                }
                switch ($this->params->module->get('adjust_' . $npcId))
                {
                    default:
                        continue;
                        break;

                    case 'no':
                        $npc['normal'] = false;
                        $npc['heroic'] = false;
                        $npc['mythic'] = false;
                        break;

                    case 'normal':
                        $npc['normal'] = true;
                        break;

                    case 'heroic':
                        $npc['heroic'] = true;
                        break;

                    case 'mythic':
                        $npc['mythic'] = true;
                        break;
                }
            }
        }
    }

    /**
     * @param $link
     * @param $id
     * @param bool $npc
     *
     * @return string
     */
    private function link($link, $id, $npc = false)
    {
        if ($npc)
        {
            $sites['battle.net'] = 'http://' . $this->params->global->get('region') . '.battle.net/wow/' . $this->params->global->get('locale') . '/' . $link;
            $sites['wowhead.com'] = 'http://' . $this->params->global->get('locale') . '.wowhead.com/npc=' . $id;
        } else
        {
            $sites['battle.net'] = 'http://' . $this->params->global->get('region') . '.battle.net/wow/' . $this->params->global->get('locale') . '/' . $link;
            $sites['wowhead.com'] = 'http://' . $this->params->global->get('locale') . '.wowhead.com/zone=' . $id;
        }

        return $sites[$this->params->global->get('link')];
    }

    private function generateINI()
    {
        header("Content-type: text/plain; charset=utf-8");

        foreach ($this->raids as $zoneId => &$zone)
        {

            echo 'MOD_WOW_RAID_PROGRESS_WOD_ZONE_' . $zoneId . ' = ""' . PHP_EOL;

            foreach ($zone['npcs'] as $npcId => &$npc)
            {
                echo 'MOD_WOW_RAID_PROGRESS_WOD_NPC_' . $npcId . ' = ""' . PHP_EOL;
            }

            echo PHP_EOL;
        }

        exit;
    }

    private function generateXML()
    {
        header("Content-type: text/xml; charset=utf-8");

        $xml = new SimpleXMLElement('<fieldset />');
        $xml->addAttribute('name', 'adjustments');
        $xml->addAttribute('label', strtoupper('MOD_WOW_RAID_PROGRESS_WOD_adjustment_label'));

        $options = array('auto', 'no', 'normal', 'heroic', 'mythic');

        foreach ($this->raids as $zoneId => &$zone)
        {
            $spacer = $xml->addChild('field');
            $spacer->addAttribute('type', 'spacer');
            $spacer->addAttribute('class', 'label');
            $spacer->addAttribute('label', 'MOD_WOW_RAID_PROGRESS_WOD_ZONE_' . $zoneId);
            foreach ($zone['npcs'] as $npcId => &$npc)
            {
                $adjust = $xml->addChild('field');
                $adjust->addAttribute('name', 'adjust_' . $npcId);
                $adjust->addAttribute('default', 'auto');
                $adjust->addAttribute('type', 'radio');
                $adjust->addAttribute('class', 'btn-group');
                $adjust->addAttribute('label', 'MOD_WOW_RAID_PROGRESS_WOD_NPC_' . $npcId);
                foreach ($options as $option)
                {
                    $child = $adjust->addChild('option', strtoupper('MOD_WOW_RAID_PROGRESS_WOD_RAID_' . $option));
                    $child->addAttribute('value', $option);
                }
            }
        }

        exit($xml->asXML());
    }
}