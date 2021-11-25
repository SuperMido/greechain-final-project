pragma solidity ^0.4.23;
import "./SupplyChainStorage.sol";
import "./Ownable.sol";

contract SupplyChainUserAddress is Ownable {
    /*Events*/
    event UserAddressUpdate(
        address indexed userAddress,
        string name,
        string contactNo,
        string UserRole,
        bool isActive,
        string profileHash
    );
    event UserAddressUserRoleUpdate(address indexed userAddress, string UserRole);

    /* Storage Variables */
    SupplyChainStorage supplyChainStorage;

    constructor(address _supplyChainAddress) public {
        supplyChainStorage = SupplyChainStorage(_supplyChainAddress);
    }

    /* Create/Update UserAddress */

    function updateUserAddress(
        string _userName,
        string _contactNo,
        string _UserRole,
        bool _isActive,
        string _profileHash
    ) public returns (bool) {
        require(msg.sender != address(0));

        /* Call Storage Contract */
        bool status = supplyChainStorage.setUserAddress(
            msg.sender,
            _userName,
            _contactNo,
            _UserRole,
            _isActive,
            _profileHash
        );

        /*call event*/
        emit UserAddressUpdate(
            msg.sender,
            _userName,
            _contactNo,
            _UserRole,
            _isActive,
            _profileHash
        );
        emit UserAddressUserRoleUpdate(msg.sender, _UserRole);

        return status;
    }

    /* Create/Update UserAddress For Admin  */
    function updateUserAddressForAdmin(
        address _userAddressAddress,
        string _userName,
        string _contactNo,
        string _UserRole,
        bool _isActive,
        string _profileHash
    ) public onlyOwner returns (bool) {
        require(_userAddressAddress != address(0));

        /* Call Storage Contract */
        bool status = supplyChainStorage.setUserAddress(
            _userAddressAddress,
            _userName,
            _contactNo,
            _UserRole,
            _isActive,
            _profileHash
        );

        /*call event*/
        emit UserAddressUpdate(
            _userAddressAddress,
            _userName,
            _contactNo,
            _UserRole,
            _isActive,
            _profileHash
        );
        emit UserAddressUserRoleUpdate(_userAddressAddress, _UserRole);

        return status;
    }

    /* get UserAddress */
    function getUserAddress(address _userAddressAddress)
        public
        view
        returns (
            string name,
            string contactNo,
            string UserRole,
            bool isActive,
            string profileHash
        )
    {
        require(_userAddressAddress != address(0));

        /*Getting value from struct*/
        (name, contactNo, UserRole, isActive, profileHash) = supplyChainStorage
            .getUserAddress(_userAddressAddress);

        return (name, contactNo, UserRole, isActive, profileHash);
    }
}
