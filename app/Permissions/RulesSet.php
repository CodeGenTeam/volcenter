<?php
namespace App\Permissions;

use App\Models\User as MUser;
use App\Permissions\Models\Group as MGroup;

abstract class RulesSet extends Permissible {

    private static $cache = [];
    protected $rules;

    /**
     * RulesSet constructor.
     * @param null $rules - список разрешений сущности.
     */
    public function __construct($rules = null) {
        $this->rules = $rules;
    }

    /**
     * Возвращает обработчик правил пользователя.
     * @param $user - идентификатор пользователя.
     * @return UserRulesSet|mixed - обработчик правил пользователя.
     */
    public static function fromUser($user) {
        if ($user instanceof MUser) {
            return RulesSet::$cache['u' . $user->login] ?? RulesSet::$cache['u' . $user->login] = new UserRulesSet($user);
        } else {
            return RulesSet::$cache['u' . $user] ?? RulesSet::$cache['u' . $user] = new UserRulesSet($user);
        }
    }

    /**
     * Возвращает обработчик правил группы.
     * @param $group - идентификатор группы.
     * @return GroupRulesSet|mixed - обработчик правил группы.
     */
    public static function fromGroup($group) {
        if ($group instanceof MGroup) {
            return RulesSet::$cache['g' . $group->name] ?? RulesSet::$cache['g' . $group->name] = new GroupRulesSet($group);
        } else {
            return RulesSet::$cache['g' . $group] ?? RulesSet::$cache['g' . $group] = new GroupRulesSet($group);
        }
    }

    /**
     * Создать кастомный обработчик правил.
     * @param $array - список правил.
     */
    public function formArray($array) {
        $this->rules = $array;
    }

    /**
     * Есть ли у данной сущности разрешение.
     * @param $permission - разрешение.
     * @param bool $inverse - инверсия.
     * @return bool - true - может.
     */
    public function can($permission, $inverse = false) {
        $can = false;
        foreach ($this->getRules() as $rule) {
            if ($can = $this->matchRule($permission, $rule)) {
                break;
            }
        }
        return $inverse ? !$can : $can;
    }

    /**
     * Возвращает простой массив правил-строк.
     * @return null - простой массив правил-строк.
     */
    public function getRules() {
        if (is_null($this->rules)) {
            $this->parseRules();
        }
        return $this->rules;
    }

    /**
     * Получить все разрешения сущности.
     */
    abstract protected function parseRules();

    private function matchRule($matcher, $my) {
        $my = explode('.', $my);
        $matcher = explode('.', $matcher);
        $i = 0;
        for (; count($matcher) > $i; $i++) {
            if (!isset($my[$i])) {
                return false;
            }
            if ($my[$i] == '*') {
                return true;
            }
            if ($my[$i] == $matcher[$i]) {
                continue;
            }
            return false;
        }
        return isset($my[$i]) ? false : true;
    }

    /**
     * Локально добавить разрешение.
     * @param $rule - правило
     */
    public function add($rule) {
        if (is_null($this->rules)) {
            $this->clear();
        }
        if (is_array($rule)) {
            foreach ($rule as $r) {
                $this->add($r);
            }
        }
        $this->rules[] = $rule;
    }

    /**
     * Локально очистить список правил.
     */
    public function clear() {
        $this->rules = [];
    }

    /**
     * Добавить правило и применить это изменение в БД.
     * @param $rule - правило.
     */
    abstract public function addRule($rule);

    /**
     * Удалить правило и применить это изменение в БД.
     * @param $rule
     */
    abstract public function removeRule($rule);

    /**
     * TODO
     * Очистка базы от неиспользуемых правил.
     */
    public static function cleanup() {
        Pex::requireRule('permissions.cleanup');
    }
}
