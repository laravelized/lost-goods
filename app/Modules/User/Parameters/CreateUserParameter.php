<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:20
 */

namespace App\Modules\User\Parameters;

use App\Modules\User\Enum\UserGenderEnum;
use App\Modules\User\Exceptions\AddressExceedsLimitException;
use App\Modules\User\Exceptions\EmailExceedsLimitException;
use App\Modules\User\Exceptions\EmailIsAlreadyUsedException;
use App\Modules\User\Exceptions\FullnameExceedsLimitException;
use App\Modules\User\Exceptions\GenderIsNotAvailableException;
use App\Modules\User\Exceptions\MobileNumberExceedsLimitException;
use App\Modules\User\Exceptions\MobileNumberIsAlreadyUsedException;
use App\Modules\User\Exceptions\UsernameIsAlreadyUsedException;
use App\Modules\User\Services\UserService\UserServiceInterface;

class CreateUserParameter
{
    private $userService;

    private $username;
    private $password;
    private $mobileNumber;
    private $fullName;
    private $gender;
    private $address;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function validate()
    {
        if ($this->userService->doUserExistByUsername($this->getUsername())) {
            throw new UsernameIsAlreadyUsedException(UsernameIsAlreadyUsedException::MESSAGE_KEY);
        }

        if ($this->userService->doUserExistByMobileNumber($this->getMobileNumber())) {
            throw new MobileNumberIsAlreadyUsedException(MobileNumberIsAlreadyUsedException::MESSAGE_KEY);
        }

        if (strlen($this->getUsername()) > 191) {
            throw new EmailExceedsLimitException(EmailExceedsLimitException::MESSAGE_KEY);
        }

        if (strlen($this->getFullName()) > 191) {
            throw new FullnameExceedsLimitException(FullnameExceedsLimitException::MESSAGE_KEY);
        }

        if (strlen($this->getAddress()) > 191) {
            throw new AddressExceedsLimitException(AddressExceedsLimitException::MESSAGE_KEY);
        }

        if (!in_array($this->getGender(), UserGenderEnum::AVAILABLE_VALUES)) {
            throw new GenderIsNotAvailableException(GenderIsNotAvailableException::MESSAGE_KEY);
        }

        if (strlen($this->getMobileNumber()) > 191) {
            throw new MobileNumberExceedsLimitException(MobileNumberExceedsLimitException::MESSAGE_KEY);
        }
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $mobileNumber
     */
    public function setMobileNumber($mobileNumber): void
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName): void
    {
        $this->fullName = $fullName;
    }
}
