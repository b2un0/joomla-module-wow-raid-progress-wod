<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

final class ModWowRaidProgressWodHelper
{
    private $params = null;

    private $raids = array(
        // Blackrock Foundry
        6967 => array(
            'link' => 'zone/blackrock-foundry/',
            'stats' => array('kills' => 0, 'mode' => 'normal'),
            'npcs' => array(
                // Blackhand
                87420 => array(
                    'link' => 'zone/blackrock-foundry/blackhand',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 0
                ),
                // Beastlord Darmac
                76865 => array(
                  'link' => 'zone/blackrock-foundry/beastlord-darmac',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Flamebender Ka'graz
                76814 => array(
                  'link' => 'zone/blackrock-foundry/flamebender-kagraz',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Operator Thogar
                76906 => array(
                  'link' => 'zone/blackrock-foundry/operator-thogar',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // The Blast Furnace"
                76809 => array(
                  'link' => 'zone/blackrock-foundry/the-blast-furnace',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Hans'gar and Franzok
                76974 => array(
                  'link' => 'zone/blackrock-foundry/Hansgar-and-franzok',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Gruul
                76877 => array(
                  'link' => 'zone/blackrock-foundry/gruul',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Kromog
                77692 => array(
                  'link' => 'zone/blackrock-foundry/kromog',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Oregorger
                77182 => array(
                  'link' => 'zone/blackrock-foundry/oregorger',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // The Iron Maidens
                77577 => array(
                  'link' => 'zone/blackrock-foundry/the-ron-maidens',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                )
            ),
        ),
        // Highmaul
        6996 => array(
            'link' => 'zone/highmaul/',
            'stats' => array('kills' => 0, 'mode' => 'normal'),
            'npcs' => array(
                // The Butcher
                87447 => array(
                    'link' => 'zone/highmaul/the-butcher',
                    'normal' => 0,
                    'heroic' => 0,
                    'mythic' => 0
                ),
                // Kargath Bladefist
                87444 => array(
                  'link' => 'zone/highmaul/kargath-bladefist',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Twin Ogron
                87449 => array(
                  'link' => 'zone/highmaul/twin-ogron',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Ko'ragh
                87445 => array(
                  'link' => 'zone/highmaul/koragh',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Tectus
                87446 => array(
                  'link' => 'zone/highmaul/tectus',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Brackenspore
                87441 => array(
                  'link' => 'zone/highmaul/brackenspore',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
                // Imperator Mar'gok
                87818 => array(
                  'link' => 'zone/highmaul/imperator-margok',
                  'normal' => 0,
                  'heroic' => 0,
                  'mythic' => 0
                ),
            ),
        )
    );

    private function __construct(JRegistry $params)
    {
        if (version_compare(JVERSION, 3, '>=')) {
            $params->set('guild', rawurlencode(JString::strtolower($params->get('guild'))));
            $params->set('realm', rawurlencode(JString::strtolower($params->get('realm'))));
        } else {
            $params->set('realm', str_replace(array('%20', ' '), '-', $params->get('realm')));
            $params->set('guild', str_replace(array('%20', ' '), '%2520', $params->get('guild')));
        }

        $params->set('region', JString::strtolower($params->get('region')));
        $params->set('lang', JString::strtolower($params->get('lang', 'en')));
        $params->set('link', $params->get('link', 'battle.net'));

        $this->params = $params;
    }

    public static function getAjax()
    {
        $module = JModuleHelper::getModule('mod_' . JFactory::getApplication()->input->get('module'));

        if (empty($module)) {
            return false;
        }

        JFactory::getLanguage()->load($module->module);

        $params = new JRegistry($module->params);
        $params->set('ajax', 0);

        ob_start();

        require(dirname(__FILE__) . '/' . $module->module . '.php');

        return ob_get_clean();
    }

    public static function getData(JRegistry $params)
    {
        if ($params->get('ajax')) {
            return;
        }

        $instance = new self($params);

        return $instance->getRaids();
    }

    private function getRaids()
    {
        if ($this->params->get('mode') == 'auto') {
            $url = 'http://' . $this->params->get('region') . '.battle.net/api/wow/guild/' . $this->params->get('realm') . '/' . $this->params->get('guild') . '?fields=members,achievements';

            $result = $this->remoteContent($url);

            if (!is_object($result)) {
                return $result;
            }

            $this->checkNormal($result->achievements);

            if (in_array('mythic', (array)$this->params->get('difficulty')) && $this->params->get('ranks')) {
               $this->checkMythic($result->members);
            }

            if (in_array('heroic', (array)$this->params->get('difficulty')) && $this->params->get('ranks')) {
               $this->checkHeroic($result->members);
            }
        }

        if ($hidden = $this->params->get('hide')) {
            foreach ($hidden as $hide) {
                unset($this->raids[$hide]);
            }
        }

        $this->adjustments();

        // at last replace links and count mode-kills
        foreach ($this->raids as $zoneId => &$zone) {
            $zone['link'] = $this->link($zone['link'], $zoneId);
            $mythic = $heroic = $normal = 0;
            foreach ($zone['npcs'] as $npcId => &$npc) {
                $npc['link'] = $this->link($npc['link'], $npcId, true);
                if ($npc['mythic'] === true) {
                  $heroic++;
                }
                if ($npc['heroic'] === true) {
                    $heroic++;
                }
                if ($npc['normal'] === true) {
                    $normal++;
                }
            }

            if ($normal > 0) {
                $zone['stats']['kills'] = $normal;
            }

            if ($heroic > 0) {
                $zone['stats']['kills'] = $heroic;
                $zone['stats']['mode'] = 'heroic';
            }

            if ($mythic > 0) {
               $zone['stats']['kills'] = $mythic;
               $zone['stats']['mode'] = 'mythic';
            }

            $zone['opened'] = in_array($zoneId, (array)$this->params->get('opened'));

            $zone['stats']['bosses'] = count($zone['npcs']);
            $zone['stats']['percent'] = round(($zone['stats']['kills'] / $zone['stats']['bosses']) * 100);
        }

        return $this->raids;
    }

    private function remoteContent($url)
    {
        $cache = JFactory::getCache('wow', 'output');
        $cache->setCaching(1);
        $cache->setLifeTime($this->params->get('cache_time', 24) * 60 + rand(0, 60)); // randomize cache time a little bit for each url

        $key = md5($url);

        if (!$result = $cache->get($key)) {
            try {
                $http = JHttpFactory::getHttp();
                $http->setOption('userAgent', 'Joomla! ' . JVERSION . '; WoW Raid Progress - WoD; php/' . phpversion());

                $result = $http->get($url, null, $this->params->get('timeout', 10));
            } catch (Exception $e) {
                return $e->getMessage();
            }

            $cache->store($result, $key);
        }

        if ($result->code != 200) {
            return __CLASS__ . ' HTTP-Status ' . JHtml::_('link', 'http://wikipedia.org/wiki/List_of_HTTP_status_codes#' . $result->code, $result->code, array('target' => '_blank'));
        }

        return json_decode($result->body);
    }

    private function checkNormal(stdClass $achievements)
    {
        foreach ($this->raids as &$zone) {
            foreach ($zone['npcs'] as &$npc) {
                $npc['normal'] = in_array($npc['normal'], $achievements->criteria);
            }
        }
    }

    private function checkHeroic(array &$members)
    {
        $heroicIds = $this->getHeroicIDs();
        foreach ($members as &$member) {
            if (in_array($member->rank, $this->params->get('ranks'))) {
                $member->achievements = $this->loadMember($member->character->name);
                if ($member->achievements) {
                    foreach ($heroicIds as $id => $zoneNpc) {
                        list ($npc, $zone) = explode(':', $zoneNpc, 2);
                        if (in_array($id, $member->achievements->achievementsCompleted)) {
                            $this->raids[$zone]['npcs'][$npc]['heroic']++;
                        }
                    }
                }
            }
        }

        foreach ($this->raids as &$zone) {
            foreach ($zone['npcs'] as &$npc) {
                $npc['heroic'] = (bool)($npc['heroic'] >= $this->params->get('successful', 5));
            }
        }
    }

    private function checkMythic(array &$members)
    {
        $mythicIds = $this->getMythicIDs();
        foreach ($members as &$member) {
            if (in_array($member->rank, $this->params->get('ranks'))) {
                $member->achievements = $this->loadMember($member->character->name);
                if ($member->achievements) {
                    foreach ($mythicIds as $id => $zoneNpc) {
                        list ($npc, $zone) = explode(':', $zoneNpc, 2);
                        if (in_array($id, $member->achievements->achievementsCompleted)) {
                           $this->raids[$zone]['npcs'][$npc]['mythic']++;
                        }
                    }
               }
            }
        }

        foreach ($this->raids as &$zone) {
            foreach ($zone['npcs'] as &$npc) {
                $npc['mythic'] = (bool)($npc['mythic'] >= $this->params->get('successful', 5));
            }
        }
    }

    private function getHeroicIDs()
    {
        $result = array();
        foreach ($this->raids as $zoneId => &$zone) {
            foreach ($zone['npcs'] as $npc => &$modes) {
                $result[$modes['heroic']] = $npc . ':' . $zoneId;
                $modes['heroic'] = 0;
            }
        }
        return $result;
    }

    private function getMythicIDs()
    {
        $result = array();
        foreach ($this->raids as $zoneId => &$zone) {
            foreach ($zone['npcs'] as $npc => &$modes) {
                $result[$modes['mythic']] = $npc . ':' . $zoneId;
                $modes['mythic'] = 0;
            }
        }
        return $result;
    }

    private function loadMember($name)
    {
        $url = 'http://' . $this->params->get('region') . '.battle.net/api/wow/character/' . $this->params->get('realm') . '/' . $name . '?fields=achievements';

        $result = $this->remoteContent($url);

        if (!is_object($result) || !isset($result->achievements)) {
            return false;
        }

        return $result->achievements;
    }

    private function adjustments()
    {
        foreach ($this->raids as $zoneId => &$zone) {
            foreach ($zone['npcs'] as $npcId => &$npc) {
                if ($npc['mythic'] === true || $npc['heroic'] === true || $npc['normal'] === true) {
                    continue;
                }
                switch ($this->params->get('adjust_' . $npcId)) {
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

    private function link($link, $id, $npc = false)
    {
        if ($npc) {
            $sites['battle.net'] = 'http://' . $this->params->get('region') . '.battle.net/wow/' . $this->params->get('lang') . '/' . $link;
            $sites['wowhead.com'] = 'http://' . $this->params->get('lang') . '.wowhead.com/npc=' . $id;
            $sites['wowdb.com'] = 'http://www.wowdb.com/npcs/' . $id;
        } else {
            $sites['battle.net'] = 'http://' . $this->params->get('region') . '.battle.net/wow/' . $this->params->get('lang') . '/' . $link;
            $sites['wowhead.com'] = 'http://' . $this->params->get('lang') . '.wowhead.com/zone=' . $id;
            $sites['wowdb.com'] = 'http://www.wowdb.com/zones/' . $id;
        }

        return $sites[$this->params->get('link')];
    }

    private function generateXML()
    {
        header("Content-type: text/xml; charset=utf-8");

        $xml = new SimpleXMLElement('<fieldset />');
        $xml->addAttribute('name', 'adjustments');
        $xml->addAttribute('label', strtoupper(__CLASS__ . '_adjustments_label'));

        $options = array('auto', 'no', 'normal', 'heroic');

        foreach ($this->raids as $zoneId => &$zone) {
            $spacer = $xml->addChild('field');
            $spacer->addAttribute('type', 'spacer');
            $spacer->addAttribute('class', 'label');
            $spacer->addAttribute('label', strtoupper(__CLASS__) . '_ZONE_' . $zoneId);
            foreach ($zone['npcs'] as $npcId => &$npc) {
                $adjust = $xml->addChild('field');
                $adjust->addAttribute('name', 'adjust_' . $npcId);
                $adjust->addAttribute('default', 'auto');
                $adjust->addAttribute('type', 'radio');
                $adjust->addAttribute('class', 'btn-group');
                $adjust->addAttribute('label', strtoupper(__CLASS__) . '_NPC_' . $npcId);
                foreach ($options as $option) {
                    $child = $adjust->addChild('option', strtoupper(__CLASS__ . '_RAID_' . $option));
                    $child->addAttribute('value', $option);
                }
            }
        }

        exit($xml->asXML());
    }
}