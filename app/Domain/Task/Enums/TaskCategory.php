<?php

namespace App\Domain\Task\Enums;

enum TaskCategory: string
{
    case Chore = 'chore';
    
    case Feature= 'feature';

    case Fix = 'fix';

    case ServiceRequest = 'service_request';

    public function translate(): string
    {
      	return match ($this) {
	  		$this::Chore => 'Tarefa',
			$this::Feature => 'Implementação',
			$this::Fix => 'Conserto',
			$this::ServiceRequest => 'Requisição de trabalho',
      	};
    }
}