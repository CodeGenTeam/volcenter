<?php
namespace App\Permissions;

use App\Permissions\Models\Rule as MRule;
use Auth;
use ReflectionFunction;
use Route;

class Permissions extends Permissible {

    private $isAdminMode = false;

    /**
     * Возвращает модель правила. Если его нет в базе -- оно будет создано
     * @param $rule - строка-правило (ex. permission.test)
     * @param $descr - описание правила
     * @return Rule - модель правила в бд
     */
    public function getOrCreateRule($rule, $descr) {
        return $this->getRule($rule) ?? MRule::create(['rule' => $rule, 'descr' => $descr]);
    }

    /**
     * Возвращает модель правила.
     * @param $rule - строка-правило (ex. permission.test)
     * @return static - Rule или null если правила нет в бд.
     */
    public function getRule($rule) {
        if ($rule instanceof MRule) {
            return $rule;
        } elseif (is_string($rule)) {
            return MRule::where('rule', $rule)->first();
        } else {
            return MRule::find($rule);
        }
    }

    /**
     * Выполнить данный кусок кода без ограничений по разрешениям.
     * @param $function - код для выполнения
     * @return mixed|null - данные которые вернула ф-ция
     */
    public function sudo($function) {
        $state = $this->isAdminMode();
        $this->setupAdminMode(true);
        if (is_callable($function)) {
            $data = (new ReflectionFunction($function))->invoke();
        }
        $this->setupAdminMode($state);
        return $data ?? null;
    }

    /**
     * Проверяет активность модификации обхода правил. (см setupAdminMode)
     * @return bool - true если обход правил действует.
     */
    public function isAdminMode() {
        return $this->isAdminMode;
    }

    /**
     * Устанавливает обход правил. Тоесть все проверки Pex::can(<rule>) будут возвращать true.
     * @param bool $mode - true включить, false - отключить
     * @return bool - true если обход правил действует.
     */
    public function setupAdminMode($mode = true) {
        return $this->isAdminMode = $mode;
    }

    /**
     * Почучить обработчик правил для пользователя.
     * @param null $user - имя/id/модель юзера.
     * @return UserRulesSet|null - обработчик правил.
     */
    public function userRules($user = null) {
        return RulesSet::fromUser($user ?? Auth::user());
    }

    /**
     * Почучить обработчик правил для группы.
     * @param null $group - имя/id/модель группы.
     * @return GroupRulesSet|null - обработчик правил.
     */
    public function groupRules($group) {
        return RulesSet::fromGroup($group);
    }

    /**
     * Проверить данного пользователя данным правилом. Если оно отсутствует у него выдать 403 ошибку.
     * @param $permission - разрешение для проверки.
     * @param bool $inverse - инвертировать
     */
    public function requireRule($permission, $inverse = false) {
        if (!$this->can($permission, $inverse)) {
            abort(403);
        }
    }

    /**
     * Есть ли у данного пользователя разрешение.
     * @param $permission - разрешение.
     * @param bool $inverse - инверсия.
     * @return bool - true -может.
     */
    public function can($permission, $inverse = false) {
        if ($this->isAdminMode()) {
            return !$inverse;
        }
        return $this->userRules()->can($permission, $inverse);
    }

    public function routes() {
        Route::get('/pex/user/can/{permission}/{user?}', 'PermissionsController@can');
        Route::get('/pex/user/rules/{user?}', 'PermissionsController@rules');
        Route::get('/pex/user/addrule/{permission}/{user}', 'PermissionsController@addUserRule');
        Route::get('/pex/user/removerule/{permission}/{user}', 'PermissionsController@removeUserRule');
        Route::get('/pex/user/group/{user?}', 'PermissionsController@group');

        Route::get('/pex/group/create/{name}', 'PermissionsController@createGroup'); // создание группы с именем name
        Route::get('/pex/group/remove/{name}', 'PermissionsController@removeGroup');
        Route::get('/pex/group/{group?}', 'PermissionsController@groupInfo'); // получить инфу о группе (если group null -- получить инфу о твоеё первой группе)
        Route::get('/pex/group/addrule/{permission}/{group}', 'PermissionsController@addGroupRule');
        Route::get('/pex/group/removerule/{permission}/{group}', 'PermissionsController@removeGroupRule');
    }
}
