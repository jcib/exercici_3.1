<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container2MiM9Wz\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container2MiM9Wz/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container2MiM9Wz.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container2MiM9Wz\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container2MiM9Wz\App_KernelDevDebugContainer([
    'container.build_hash' => '2MiM9Wz',
    'container.build_id' => 'c08b307d',
    'container.build_time' => 1583243929,
], __DIR__.\DIRECTORY_SEPARATOR.'Container2MiM9Wz');
